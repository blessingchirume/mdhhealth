<div>
    <div>
        <p>Duration: <span class="duration">{{ $duration }}</span> minutes</p>
    </div>

    <script>
        document.addEventListener('livewire:load', function () {
            setInterval(function () {
                // Update the duration every 5 minutes
                const startTime = new Date(Date.parse('{{ $theatreAdmission->time_in }}'));
                console.log('Start Time:', startTime);
                const durationInMinutes = Math.floor((Date.now() - startTime) / (1000 * 60));
                console.log('Duration:', durationInMinutes);
                document.getElementsByClassName('duration')[0].innerText = durationInMinutes;
            }, 5000); // Update every 5 seconds for testing
        });
    </script>
</div>
