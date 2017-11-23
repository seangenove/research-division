<!-- TODO: add remove question and remove value -->
<template>
    <div class="box-body">
        <div class="form-group">
            <label for="questionnaireName">Questionnaire Name</label>
            <input readonly class="form-control" id="questionnaireName" v-model="questionnaire.name" type="text"
                   placeholder="Questionnaire Name...">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea readonly class="form-control" v-model="questionnaire.description" id="" cols="30" rows="10"></textarea>
        </div>
        <hr>
        <div v-for="question in questionnaire.questions">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="questionnaireName">Question Name</label>
                        <input readonly class="form-control" type="text" v-model="question.question">
                    </div>
                    <div class="form-group">
                        <input disabled type="checkbox" v-model="question.required">
                        <label>Required</label>
                    </div>
                    <div class="form-group">
                        <label for="">Answer Type</label>
                        <select readonly v-model="question.type" id="quesType" class="form-control"
                                v-on:change="question.values = []">
                            <option v-bind:value="'short'">Short Answer</option>
                            <option v-bind:value="'long'">Long Answer</option>
                            <option v-bind:value="'radio'">Multiple Choice</option>
                            <option v-bind:value="'checkbox'">Checkboxes</option>
                        </select>
                    </div>
                    <div v-if="question.type === 'radio'" class="form-group">
                        <label for="">Radio Box Values</label>
                        <div v-for="val in question.values">
                            <div class="input-group">
                                <input disabled type="radio">
                                <label for="">{{ val.value }}</label>
                            </div>
                        </div>
                    </div>
                    <div v-if="question.type === 'checkbox'">
                        <label for="">Check Box Values</label>
                        <div v-for="val in question.values">
                            <div class="input-group">
                                <input disabled type="checkbox">
                                <label for="">{{ val.value }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <hr>

        </div>
        <form v-bind:action="action" method="post">
            <input type="hidden" name="_method" value="PATCH">
            <input name="json-values" type="hidden" v-bind:value="JSON.stringify(questionnaire)">
            <input type="hidden" name="_token" v-bind:value="csrf_token">
            <button class="btn btn-primary pull-right" type="submit">Submit</button>
        </form>

        <hr>
        <h5 class="page-header">For development (JSON passed to controller)</h5>
        <pre>{{ questionnaire }}</pre>
    </div>
</template>

<script>

    class Questions {

    }
    export default {
        props: ['action', 'csrf_token', 'old'],
        mounted() {
            console.log('Component mounted.');
        },
        methods: {
            addQuestion(){
                this.questionnaire.questions.push({
                    question: '',
                    required: false,
                    type: '',
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
                questionnaire: JSON.parse(this.old)
            }
        }
    }
</script>
