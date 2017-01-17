<section>
    <div class="container" id="intro-section">
        <div class="row">
            <div class="col-sm-12">
                <h1>Rumbles Beats</h1>
            </div>
            <div class="col-sm-6">
                <div class="add-new-track">
                    $AddTrackForm
                    <div class="well">
                        {{ newTrackTitle }}
                        {{ newTrackDescription }}

                    </div>
                </div>

                <div class="add-new-album">
                    $AddAlbumForm
                </div>
            </div>

            <div class="col-sm-6">

                <ul>
                    <div class="well" v-show="albumForm.albumTitle">
                        <li v-show="albumForm.albumTitle">
                            <item-title class="text-success">{{ albumForm.albumTitle }}</item-title>
                            <item-description>{{ albumForm.albumDescription }}</item-description>
                        </li>
                    </div>

                    <li v-for="album in albums">
                        <h1>{{ album.albumTitle }}</h1>
                        <pre>{{ album.albumDescription }}</pre>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</section>