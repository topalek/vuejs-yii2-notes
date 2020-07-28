<template>
    <div class="tc-notes-wrapper">
        <add-new-button @addNote="addNote"/>
        <div class="tc-notes">
            <note :key="index" :note="note" @deleteNote="deleteNote" @noteUpdate="noteUpdate"
                  v-for="(note,index) in notes"/>
        </div>
    </div>
</template>

<script>
    import AddNewButton from "./AddNewButton";
    import Note from "./Note";
    import noteService from "../sevices/note.service";

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
                const {status, data} = await noteService.create('note', {});
                if (status === 201) {
                    this.notes.unshift(data);
                }
            },
            async deleteNote(note) {
                const {status} = await noteService.delete(note.id);
                if (status === 204) {
                    this.notes.splice(this.notes.indexOf(note));
                }
            },
            async noteUpdate(note) {
                const {status} = await noteService.update(note);
                if (status === 200) {
                    // this.notes.splice(this.notes.indexOf(note));
                }
                // this.notes[this.notes.indexOf(note)] = note;
            }
        },
        async mounted() {
            const {status, data} = await noteService.get();
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
