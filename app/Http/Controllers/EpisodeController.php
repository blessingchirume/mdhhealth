<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Http\Requests\StoreEpisodeRequest;
use App\Http\Requests\UpdateEpisodeRequest;
use App\Models\ChargeSheet;
use App\Models\EpisodeItem;
use App\Models\Gurantor;
use App\Models\Item;
use App\Models\NextOfKeen;
use App\Models\Note;
use App\Models\Patient;
use App\Models\PatientMedicalAidEntry;
use App\Models\Payment;
use App\Models\Vital;
use App\Models\VitalGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Invoice;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\Observation;

class EpisodeController extends Controller
{

    public function index()
    {
        $episodes = Episode::all();

        return view('layouts.patients.episodes.index', compact('episodes'));
    }

    public function create(Patient $patient)
    {
        return view('layouts.patients.episodes.create', compact('patient'));
    }

    public function store(Request $request, Patient $patient)
    {

        // dd($request);
        $data = $request->validate([
            'patient_type' => 'required',
            'attendee' => 'required',
            'ward' => 'required',
        ]);

        // dd($data);

        $nextOfKeen = $request->validate([
            'next_of_keen_name' => 'required',
            'next_of_keen_surname' => 'required',
            'next_of_keen_phone' => 'required',
            'next_of_keen_gender' => 'required',
            'next_of_keen_national_id' => 'required',
            'next_of_keen_address' => 'required',
        ]);

        // dd($nextOfKeen);

        $guarantor = [
            'name' => $request->guarantor_name,
            'surname' => $request->guarantor_surname,
            'phone' => $request->guarantor_phone,
            'gender' => $request->guarantor_gender,
            'national_id' => $request->guarantor_national_id,
            'address' => $request->guarantor_address,
            'relationship' => $request->guarantor_relationship,
        ];
        // dd($guarantor);
        $medicalAid = $request->validate([
            'package_id' => 'required',
            'member_name' => 'required',
            'policy_number' => 'required',
            'suffix_number' => 'required'
        ]);

        // dd($medicalAid);

        $data["episode_entry"] = (int)Episode::where('patient_id', $patient->id)->max('episode_entry') + 1;
        $data["episode_code"] = $patient->patient_id . "/" . $data["episode_entry"];

        $data["patient_id"] = $patient->id;
        $data["payment_option_id"] = $request->paymentOption;
        $data["date"] = date('Y-m-d');

        $episode = Episode::create($data);

        ChargeSheet::create([
            "episode_id" => $episode->id,
            "checkin" => date('Y-m-d'),
        ]);

        // $data["patient_id"] = 'AGHS' . rand(00000, 99999);

        // Patient::create($data);

        $medicalAid["patient_id"] = $patient->id;
        PatientMedicalAidEntry::where('patient_id', $patient->id)->update($medicalAid);

        $nextOfKeen["patient_id"] = $medicalAid["patient_id"];
        $nextOfKeen["next_of_keen_relationship"] = "Husband";
        NextOfKeen::where('patient_id', $patient->id)->update($nextOfKeen);

        $guarantor['patient_id'] = $medicalAid['patient_id'];
        Gurantor::where('patient_id', $patient->id)->update($guarantor);
        return back()->with('success', 'Records created successfully');
    }

    public function show(Episode $episode)
    {
        $items = Item::all();
        // $episode->load(['chargesheet']);
        $vitalGroups = VitalGroup::all();
        $observations = Observation::where('episode_id', $episode->id)->get();

        // dd($observations);
        return view('layouts.patients.episodes.show', compact('episode', 'items', 'vitalGroups', 'observations'));
    }

    public function edit(Episode $episode)
    {
        //
    }

    public function update(UpdateEpisodeRequest $request, Episode $episode)
    {
        //
    }

    public function discharge($episode)
    {
        $discharge = ChargeSheet::where('episode_id', $episode)->update([
            'checkout' => date('Y-m-d'),
        ]);
        return redirect()->back()->with('success', 'Patient Discharged successfully!');
    }

    public function destroy(Episode $episode)
    {
        //
    }

    public function createNote(Request $request, Episode $episode)
    {
        try {
            $note = Note::create([
                'episode_id' => $episode->id,
                'user_id' => Auth::user()->name,
                'comment' => $request->comment
            ]);
            return redirect()->back()->with('success', 'comment added successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function createItem(Request $request, Episode $episode)
    {
        try {

            $episode->items()->attach($request->item_id, ['quantity' => (int)$request->quantity]);

            $base_amount = $episode->base_amount;
            $amount_due = $episode->amount_due;
            foreach ($episode->items as $item) {
                $base_amount += (int)($item->pivot->quantity) * (int)($episode->patient->medicalaid->package->itemPrice($item->id, $episode->patient->medicalaid->package->id)->price);
                $amount_due += (int)($item->pivot->quantity) * (int)($episode->patient->medicalaid->package->itemPrice($item->id, $episode->patient->medicalaid->package->id)->price);
            }
            $episode->update(['amount_due' => $amount_due, 'base_amount' => $base_amount]);
            return redirect()->back()->with('success', 'comment added successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function createVital(Request $request, Episode $episode)
    {
        try {
            $note = Vital::create([
                'episode_id' => $episode->id,
                'name' => $request->vital_name,
                'value' => $request->vital_value
            ]);

            return redirect()->back()->with('success', 'vital item added successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function createChargesheet(Episode $episode)
    {
        $client = new Party([
            'name'          => 'Mbuya Dorcas Hospital',
            'phone'         => '(520) 318-9486',
            'custom_fields' => [
                'note'        => 'IDDQD',
                'business id' => '365#GG',
            ],
        ]);

        $customer = new Party([
            'name'          => $episode->patient->name . " " . $episode->patient->surname,
            'address'       => $episode->patient->address,
            'code'          => $episode->patient->patient_id,
            'custom_fields' => [
                'Episode number' => $episode->episode_code,
            ],
        ]);

        $items = [

            // InvoiceItem::make('Service 2')->pricePerUnit(71.96)->quantity(2),
            // InvoiceItem::make('Service 3')->pricePerUnit(4.56),
            // InvoiceItem::make('Service 4')->pricePerUnit(87.51)->quantity(7)->discount(4)->units('kg'),
            // InvoiceItem::make('Service 5')->pricePerUnit(71.09)->quantity(7)->discountByPercent(9),
            // InvoiceItem::make('Service 6')->pricePerUnit(76.32)->quantity(9),
            // InvoiceItem::make('Service 7')->pricePerUnit(58.18)->quantity(3)->discount(3),
            // InvoiceItem::make('Service 8')->pricePerUnit(42.99)->quantity(4)->discountByPercent(3),
            // InvoiceItem::make('Service 9')->pricePerUnit(33.24)->quantity(6)->units('m2'),
            // InvoiceItem::make('Service 11')->pricePerUnit(97.45)->quantity(2),
            // InvoiceItem::make('Service 12')->pricePerUnit(92.82),
            // InvoiceItem::make('Service 13')->pricePerUnit(12.98),
            // InvoiceItem::make('Service 14')->pricePerUnit(160)->units('hours'),
            // InvoiceItem::make('Service 15')->pricePerUnit(62.21)->discountByPercent(5),
            // InvoiceItem::make('Service 16')->pricePerUnit(2.80),
            // InvoiceItem::make('Service 17')->pricePerUnit(56.21),
            // InvoiceItem::make('Service 18')->pricePerUnit(66.81)->discountByPercent(8),
            // InvoiceItem::make('Service 19')->pricePerUnit(76.37),
            // InvoiceItem::make('Service 20')->pricePerUnit(55.80),
        ];

        foreach($episode->chargesheetItems as $index => $value){
            array_push($items, InvoiceItem::make($value->item_code)
            ->description($value->item_description)
            ->pricePerUnit($value->base_price)
            ->quantity((int)$value->pivot->quantity)
            ->discount(1.00));
        }

        $notes = [
            'your multiline',
            'additional notes',
            'in regards of '.$episode->episode_code,
        ];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make('chargesheet')
            ->series('MDH')
            // ability to include translated invoice status
            // in case it was paid
            ->status(__('invoices::invoice.due'))
            ->sequence(667)
            // ->serialNumberFormat('{SEQUENCE}/{SERIES}')
            ->seller($client)
            ->buyer($customer)
            ->date(now()->subWeeks(0))
            ->dateFormat('m/d/Y')
            ->payUntilDays(14)
            ->currencySymbol('$')
            ->currencyCode('USD')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->name . ' ' . $customer->name)
            ->addItems($items)
            ->notes($notes)
            // ->logo(public_path('vendor/invoices/sample-logo.png'))
            // ->payUntilDays(10)
            // You can additionally save generated invoice to configured disk
            ->save('public');

        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }

    public function payment(Request $request, Episode $episode)
    {
        try {
            Payment::create([
                'episode_id' => $episode->id,
                'amount' => $request->amount,
                'balance' => 0,
                'date' => date('Y-m-d')
            ]);
            return redirect()->back()->with('success', 'payment created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
