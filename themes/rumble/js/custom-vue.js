/**
 * Created by admin on 11/01/17.
 */
class AlbumForm {
    constructor(data){

        this.data = data;

        for(let field in data){
            this[field] = data[field];
        }

    }
    // reset form fields
    reset() {

    }
}

new Vue({

    el: '#rumbles-app',
    data: {
        newTrackTitle: '',
        newTrackDescription: '',
        tracks: [],
        albums: [],
        // newAlbumTitle: '',
        // newAlbumDescription: ''
        albumForm: new AlbumForm({
            newAlbumTitle: '',
            newAlbumDescription: ''
        })
    },

    methods: {
        addTrack: function () {
            //alert('adding track');
            // this.tracks.push(this.newTrackTitle);
            this.tracks.push(this.newTrackTitle);
        },

        onAlbumSubmit() {

            axios.post('/albums/processAddAlbum', {
                albumTitle: this.albumForm.newAlbumTitle,
                albumDescription: this.albumForm.newAlbumDescription
            })
                // .then(response => alert('success'))
                .then(this.onAlbumSubmitSuccess)
                .catch(error => {
                    // alert(error.response);
                    alert('Error trying to create new Album');
                })

        },

        onAlbumSubmitSuccess(response){
            //alert('Album has been added');
            alert('Album ' + this.newAlbumTitle + ' has been created');
            this.newAlbumTitle = '';
            this.newAlbumDescription = '';
        }
    },

    mounted() {

        // Make an ajax request to our server /getAllAlbums

        // $.ajax() or $.getJson() if we have JQuery library
        // axios.get('/albums/getAllAlbums').then(response => console.log(response));
        // axios.get('/albums/getAllAlbums').then(response => this.tracks = response.data);
        axios.get('/albums/getAllAlbums').then(response => this.albums = response.data.items);

    }
});
