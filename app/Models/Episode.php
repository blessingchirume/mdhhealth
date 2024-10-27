<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function chargesheet() {
        return $this->hasOne(ChargeSheet::class);
    }

    public function vitals() {
        return $this->hasMany(Vital::class);
    }

    public function notes () {
        return $this->hasMany(Note::class);
    }

    public function items(){
        return $this->belongsToMany(Item::class, 'episode_items', 'episode_id', 'item_id')->withPivot('quantity');
    }

    public function chargesheetItems(){
        return $this->belongsToMany(Item::class, 'chargesheet_items', 'charge_sheet_id', 'item_id')->withPivot('quantity');
    }

    public function patient() {
        return $this->belongsTo(patient::class);
    }

    public function icd10code()
    {
        return $this->belongsTo(Icd10Code::class);
    }
    public function designations() {
        return $this->hasMany(Designation::class);
    }

    public function labTests()
    {
        return $this->hasMany(LabBooking::class,'episode_id');
    }

    public function radiology()
    {
        return $this->hasMany(RadiologyBooking::class, 'episode_id', 'id');
    }

    public function theatreAdmissions() {
        return $this->hasMany(TheatreAdmissions::class, 'episode_id', 'id');
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class, 'episode_id');
    }

    public function maternity_topics()
    {
        return $this->hasMany(MaternityEducation::class, 'episode_id');
    }

    public function maternity_remarks()
    {
        return $this->hasMany(MaternityRemarks::class, 'episode_id');
    }

    public function obs_examinations()
    {
        return $this->hasMany(ObsExamination::class, 'episode_id');
    }

    public function anc_record()
    {
        return $this->hasMany(AncRecord::class, 'episode_id');
    }

    public function getTotalChargeSheetItems()
    {
        // Get all charge sheets associated with the episode
        $chargeSheets = $this->chargesheet()->get();

        // Initialize total amount
        $totalAmount = 0;

        // Loop through each charge sheet
        foreach ($chargeSheets as $chargeSheet) {
            // Get all charge sheet items for the current charge sheet
            $chargeSheetItems = $chargeSheet->items;

            // Loop through each charge sheet item and sum their quantities
            foreach ($chargeSheetItems as $item) {
                $totalAmount += $item->base_price;
            }
        }

        return $totalAmount;
    }

    public function episode_total()
    {
        return $this->getTotalChargeSheetItems();
    }

}
