<template>
    <div class="tc-notes-wrapper">
        <add-new-button @addNote="addNote"/>
        <div class="tc-notes">
            <note :key="index" :note="note" @deleteNote="deleteNote" @noteUpdated="noteUpdated"
                  v-for="(note,index) in notes"/>
        </div>
    </div>
</template>

<script>
    import AddNewButton from "./AddNewButton";
    import Note from "./Note";
    import httpClient from "../sevices/http.service";

    export default {
        name: "Notes",
        components: {Note, AddNewButton},
        data() {
            return {
                notes: []
            }
        },
        methods: {
            async addNote() {
                const {status, data} = await httpClient.post('note', {});
                if (status === 201) {
                    this.notes.unshift(data);
                }
            },
            async deleteNote(note) {
                const {status, data} = await httpClient.delete('note/' + note.id, {});
                if (status === 204) {
                    this.notes.splice(this.notes.indexOf(note));
                }
            },
            async noteUpdated(note) {
                const {status, data} = await httpClient.put('note/' + note.id, note);
                if (status === 200) {
                    // this.notes.splice(this.notes.indexOf(note));
                }
                // this.notes[this.notes.indexOf(note)] = note;
            }
        },
        async mounted() {
            const {status, data} = await httpClient.get('note');
            if (status === 200) {
                this.notes = data;
            }
        }
    }
</script>

<style lang="scss" scoped>
    .tc-notes-wrapper {
        margin: 0;
        padding-top: 50px;

        .tc-notes {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin: 0 auto;
            margin-top: 80px;
        }
    }
</style>
