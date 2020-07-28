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

    export default {
        name: "Notes",
        components: {Note, AddNewButton},
        data() {
            return {
                notes: [
                    {
                        title: 'sunt aut facere repellat',
                        body: 'uia et suscipit suscipit recusandae consequuntur expedita et cum reprehenderit molestiae ut ut quas totam nostrum rerum est autem sunt rem eveniet architecto'
                    },
                    {
                        title: 'qui est esse',
                        body: 'est rerum tempore vitae<br>nsequi sint nihil reprehenderit dolor beatae ea dolores neque <br>fugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis<br>qui aperiam non debitis possimus qui neque nisi nulla'
                    },
                    {
                        title: 'nesciunt quas odio',
                        body: 'repudiandae veniam quaerat sunt sed alias aut fugiat sit autem sed est'
                    },
                    {
                        title: 'This is a demo note',
                        body: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi corrupti officiis alias tenetur, tenetur iste maxime laudantium?'
                    },
                    {
                        title: 'qui est esse',
                        body: 'est rerum tempore vitae<br>nsequi sint nihil reprehenderit dolor beatae ea dolores neque <br>fugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis<br>qui aperiam non debitis possimus qui neque nisi nulla'
                    },
                ]
            }
        },
        methods: {
            deleteNote(note) {
                this.notes.splice(this.notes.indexOf(note), 1);
            },
            addNote() {
                this.notes.unshift({title: '', body: ''})
            },
            noteUpdated(note) {
                this.notes[this.notes.indexOf(note)] = note;
            }
        },
        mounted() {
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
