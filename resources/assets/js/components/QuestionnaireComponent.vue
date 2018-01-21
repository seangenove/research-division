<!-- TODO: add remove question and remove value -->

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>

<template>
    <div class="box-body">
        <div class="form-group" v-if="this.isOrdinance">
            <label>Associated Ordinance</label>
            <select class="form-control" v-model="questionnaire.associatedOrdinance">
                <option v-for="ordinance in oor" v-bind:value="ordinance.id">{{ ordinance.title }}</option>
            </select>
        </div>
        <div class="form-group" v-if="this.isResolution">
            <label>Associated Resolution</label>
            <select class="form-control" v-model="questionnaire.associatedResolution">
                <option v-for="resolution in oor" v-bind:value="resolution.id">{{ resolution.title }}</option>
            </select>
        </div>
        <transition name="fade">
            <div v-if="this.questionnaire.associatedResolution || this.questionnaire.associatedOrdinance">
                <div class="form-group">
                    <label for="questionnaireName">Questionnaire Name</label>
                    <input v-validate="'required'" name="name" class="form-control" id="questionnaireName" v-model="questionnaire.name" type="text"
                           placeholder="Questionnaire Name...">
                    <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" v-model="questionnaire.description" id="" cols="30" rows="10"></textarea>
                </div>
                <hr>
                <button v-on:click="addQuestion()" class="btn btn-success btn-sm">Add Question</button>
                <div v-for="question in questionnaire.questions">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="row">
                                <button v-on:click="removeQuestion(question)" class="btn btn-md btn-danger pull-right">Remove Question</button>
                            </div>
                            <div class="form-group">
                                <label for="questionnaireName">Question Name</label>
                                <input class="form-control" type="text" v-model="question.question">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" v-model="question.required" class="check">
                                <label>Required</label>
                            </div>
                            <div class="form-group">
                                <label for="">Answer Type</label>
                                <select v-model="question.type" id="quesType" class="form-control"
                                        v-on:change="question.values = []">
                                    <option v-bind:value="'short'">Short Answer</option>
                                    <option v-bind:value="'long'">Long Answer</option>
                                    <option v-bind:value="'radio'">Multiple Choice</option>
                                    <option v-bind:value="'checkbox'">Checkboxes</option>
                                </select>
                            </div>
                            <div v-if="question.type === 'radio'" class="form-group">
                                <label for="">Radio Box Values</label>
                                <button v-on:click="addValue(question)" class="btn btn-success btn-xs">Add Value</button>
                                <div v-for="val in question.values">
                                    <div class="input-group">
                                        <input class="form-control" type="text" v-model="val.value" required>
                                        <div class="input-group-btn">
                                            <button v-on:click="removeValue(question, val)" type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-if="question.type === 'checkbox'">
                                <label for="">Check Box Values</label>
                                <button v-on:click="addValue(question)" class="btn btn-success btn-xs">Add Value</button>
                                <div v-for="val in question.values">
                                    <div class="input-group">
                                        <input class="form-control" type="text" v-model="val.value" required placeholder="Enter Value...">
                                        <div class="input-group-btn">
                                            <button v-on:click="removeValue(question, val)" type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <hr>

                </div>
                <form ref="form" v-bind:action="action" method="post" @submit.prevent="validateBeforeSubmit">
                    <input name="json-values" type="hidden" v-bind:value="JSON.stringify(questionnaire)">
                    <input type="hidden" name="_token" v-bind:value="csrf_token">
                    <button class="btn btn-primary pull-right" type="submit">Submit</button>
                </form>
            </div>
        </transition>

        <hr>
        <h5 class="page-header">For development (JSON passed to controller)</h5>
        <pre>{{ questionnaire }}</pre>
        <h6>{{ isOrdinance }} || {{ isResolution}}</h6>

    </div>
</template>

<script>

    class Questions {

    }
    export default {
        props: {'action': String,
            'csrf_token': String,
            'data': String,
            'flag': String,
        },
        mounted() {

            console.log('Component mounted.')
            console.log(this.data);
            this.data = JSON.parse(this.data);
            console.log(typeof this.data);

        },
        methods: {
            validateBeforeSubmit(){
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        // eslint-disable-next-line
                        // alert('From Submitted!');
                        this.$refs.form.submit();
                        return;
                    }

                    alert('There were errrors!');
                });
            },
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
            },
            removeQuestion(question){
                this.questionnaire.questions.splice(this.questionnaire.questions.indexOf(question),1);
            },
            removeValue(question, val){
                question.values.splice(question.values.indexOf(val), 1);
            }
        },
        data(){
            return {
                hello: 'Hello World from a Vue.js Component',
                oor: JSON.parse(this.data),
                isOrdinance: this.flag === 'ordinances',
                isResolution: this.flag === 'resolutions',
                questionnaire: {
                    associatedOrdinance: '',
                    associatedResolution: '',
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
