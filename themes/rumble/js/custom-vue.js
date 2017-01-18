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
        let data = {};

        for (let property in this.originalData) {
            data[property] = this[property];
        }
        // let data = Object.assign({}, this);
        // delete data.originalData;
        return data;
    }

    // reset form fields
    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }
    }

    submit(requestType, url) {
        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data())
                .then(response => {
                    this.onSuccess(response.data);

                    resolve(response.data);
                })
                .catch(error => {
                    this.onFail(error.response.data);

                    reject(error.response.data);
                })
        });
    }

    onSuccess(data) {
        alert('Album ' + this.albumTitle + ' has been created');
        // alert(data.message);
        this.reset();
    }

    onFail(error) {
        alert('Error trying to create new Album');
    }
}

class TrackForm {
    constructor(data) {

        this.originalData = data;

        for (let field in data) {
            this[field] = data[field];
        }

    }

    data() {
        let data = {};

        for (let property in this.originalData) {
            data[property] = this[property];
        }
        // let data = Object.assign({}, this);
        // delete data.originalData;
        return data;
    }

    // reset form fields
    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }
    }

    submit(requestType, url) {
        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data())
                .then(response => {
                    this.onSuccess(response.data);

                    resolve(response.data);
                })
                .catch(error => {
                    this.onFail(error.response.data);

                    reject(error.response.data);
                })
        });
    }

    onSuccess(data) {
        alert('Track ' + this.trackTitle + ' has been created');
        // alert(data.message);
        this.reset();
    }

    onFail(error) {
        alert('Error trying to create new Track');
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
            albumTitle: '',
            albumDescription: ''
        }),
        trackForm: new TrackForm({
            trackTitle: '',
            trackDescription: '',
            assocAlbum: ''
        })
    },

    methods: {
        addTrack: function () {
            this.tracks.push(this.newTrackTitle);
        },

        onAlbumSubmit() {
            this.albums.push(this.albumForm.data());
            this.albumForm.submit('post', '/albums/processAddAlbum');
        },

        onTrackSubmit() {
            this.trackForm.submit('post', '/albums/processAddTrack');
        }
    },

    mounted() {
        axios.get('/albums/getAllAlbums').then(response => this.albums = response.data.items);
    }
});


// Vue components
Vue.component('item-title', {
    template: '<h1><slot></slot></h1>'
});

Vue.component('item-description', {
    template: '<p><slot></slot></p>'
});