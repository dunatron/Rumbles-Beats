/**
 * Created by admin on 11/01/17.
 */
class AlbumForm {
    constructor(data) {

        this.originalData = data;

        for (let field in data) {
            this[field] = data[field];
        }

    }

    data() {
        let data = Object.assign({}, this);
        delete data.originalData;
        return data;
    }

    // reset form fields
    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }
    }

    submit(requestType, url) {
        axios[requestType](url, this.data())
            .then(this.onSuccess.bind(this))
            .catch(this.onFail)
    }

    onSuccess(response) {
        alert('Album ' + this.newAlbumTitle + ' has been created');
        this.reset();
    }

    onFail(error) {
        alert('Error trying to create new Album');
    }
}

new Vue({

    el: '#rumbles-app',
    data: {
        newTrackTitle: '',
        newTrackDescription: '',
        tracks: [],
        albums: [],
        albumForm: new AlbumForm({
            newAlbumTitle: '',
            newAlbumDescription: ''
        })
    },

    methods: {
        addTrack: function () {
            this.tracks.push(this.newTrackTitle);
        },

        onAlbumSubmit() {
            this.albumForm.submit('post', '/albums/processAddAlbum');
        }
    },

    mounted() {
        axios.get('/albums/getAllAlbums').then(response => this.albums = response.data.items);
    }
});
