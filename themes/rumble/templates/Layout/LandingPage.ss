<section>
    <div class="container" id="intro-section">
        <div class="row">
            <div class="col-sm-12">
                <h1>Rumbles Beats</h1>
            </div>
            <div class="col-sm-6">
                <div class="add-new-track">
                    $AddTrackForm
                </div>
                {{ newTrackTitle }}
                {{ newTrackDescription }}

            </div>

            <div class="col-sm-6">

                <ul>
                    <li v-for="track in tracks">{{ track }}</li>
                </ul>

            </div>
        </div>
    </div>
</section>