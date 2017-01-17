<section>
    <div class="container" id="intro-section">
        <div class="row">
            <div class="col-sm-12">
                <h1>Rumbles Beats</h1>
            </div>
            <div class="col-sm-6">



                <p>
                    <a class="btn btn-primary" data-toggle="collapse" href="#addAlbumAddcordion" aria-expanded="false" aria-controls="addAlbumAddcordion">
                         new album
                    </a>
                    <a class="btn btn-primary" data-toggle="collapse" href="#addTrackAddcordion" aria-expanded="false" aria-controls="addTrackAddcordion">
                        new track
                    </a>
                </p>
                <div class="collapse" id="addAlbumAddcordion">
                    <div class="card card-block">
                        <div class="add-new-album">
                            $AddAlbumForm
                        </div>
                    </div>
                </div>
                <div class="collapse" id="addTrackAddcordion">
                    <div class="add-new-track">
                        $AddTrackForm
                        <div class="well">
                            {{ newTrackTitle }}
                            {{ newTrackDescription }}

                        </div>
                    </div>
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