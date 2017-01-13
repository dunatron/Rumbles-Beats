/**
 * Created by admin on 11/01/17.
 */

new Vue({

    el: '#rumbles-app',
    data: {
        newTrackTitle: '',
        newTrackDescription: '',
        tracks: [],
        albums: [],
        newAlbumTitle: '',
        newAlbumDescription: ''
    },

    methods: {
        addTrack: function() {
            //alert('adding track');
            // this.tracks.push(this.newTrackTitle);
            this.tracks.push(this.newTrackTitle);
        },

        onAlbumSubmit() {
            //alert('trying to submit album form');
            axios.post('/albums/processAddAlbum', {
                albumTitle: this.newAlbumTitle,
                albumDescription: this.newAlbumDescription
            });
            //axios.post('/albums/processAddAlbum', this.$data)
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
