import httpClient from "./http.service";

const noteService = {
    create(note) {
        return httpClient.post('notes', note);
    },
    get() {
        return httpClient.get('notes');
    },
    update(note) {
        return httpClient.put('notes/' + note.id, note);
    },
    delete(noteId) {
        return httpClient.delete('notes/' + noteId);
    }
}

export default noteService;
