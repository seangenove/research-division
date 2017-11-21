<template>
    <div class="box-body">
        <div class="form-group">
            <label for="questionnaireName">Questionnaire Name</label>
            <input class="form-control" id="questionnaireName" v-model="questionnaire.name" type="text"
                   placeholder="Question name">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" v-model="questionnaire.description" id="" cols="30" rows="10"></textarea>
        </div>
        <hr>
        <button v-on:click="addQuestion()">Add Question</button>
        <div v-for="question in questionnaire.questions">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="questionnaireName">Question Name</label>
                        <input class="form-control" type="text" v-model="question.question">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" v-model="question.isRequired" class="check">
                        <label>Required</label>
                    </div>
                    <div class="form-group">
                        <label for="">Answer Type</label>
                        <select v-model="question.answerType" id="quesType" class="form-control"
                                v-on:change="question.values = []">
                            <option v-bind:value="'short'">Short Answer</option>
                            <option v-bind:value="'long'">Long Answer</option>
                            <option v-bind:value="'radio'">Multiple Choice</option>
                            <option v-bind:value="'checkbox'">Checkboxes</option>
                        </select>
                    </div>
                    <div v-if="question.answerType === 'radio'" class="form-group">
                        <label for="">Radio Box Values</label>
                        <div v-for="val in question.values">
                            <input class="form-control" type="text" v-model="val.value" required>
                        </div>
                        <button v-on:click="addValue(question)">Add Value</button>
                    </div>
                    <div v-if="question.answerType === 'checkbox'">
                        <label for="">Check Box Values</label>
                        <div v-for="val in question.values">
                            <input class="form-control" type="text" v-model="val.value" required>
                        </div>
                        <button v-on:click="addValue(question)">Add Value</button>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <hr>

        </div>
        <form v-bind:action="action" method="post">
            <input name="json-values" type="text" v-bind:value="JSON.stringify(questionnaire)">
            <input type="hidden" name="_token" v-bind:value="csrf_token">
            <button>Submit</button>
        </form>
        <pre>{{ questionnaire }}</pre>

    </div>
</template>

<script>

    class Questions {

    }
    export default {
        props: ['action', 'csrf_token'],
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            addQuestion(){
                this.questionnaire.questions.push({
                    question: '',
                    isRequired: false,
                    answerType: '',
                    values: []
                });
            },
            addValue(question){
                question.values.push({value: ''});
            }
        },
        data(){
            return {
                hello: 'Hello World from a Vue.js Component',
                questionnaire: {
                    name: '',
                    description: '',
                    questions: [
//                        {
//                            question: 'Just a template',
//                            values: [{value: 'yes'}, {value: 'no'}],
//                            isRequired: true
//                        },
                    ]
                }
            }
        }
    }
</script>
