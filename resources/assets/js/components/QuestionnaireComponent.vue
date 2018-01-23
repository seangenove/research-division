<!-- TODO: add remove question and remove value -->

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0;
    }

    /* submit */
    .fixed-button-1 {
        position: fixed;
        bottom: 18vh;
        right: 7%;
    }

    /** preview **/
    .fixed-button-2 {
        position: fixed;
        bottom: 18vh;
        right: 14%;
    }

    .content {
        height: 100%;
    }

    .modal-body div.wrap{
        margin: 5%;
    }
</style>

<template>
    <div class="box-body">
        <div class="col-md-9 content">
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
                        <input v-validate="'required'" name="name" class="form-control" id="questionnaireName"
                               v-model="questionnaire.name" type="text"
                               placeholder="Questionnaire Name...">
                        <span v-show="errors.has('name')"
                              class="help is-danger text-danger">{{ errors.first('name') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" v-model="questionnaire.description" id="" cols="30"
                                  rows="10"></textarea>
                    </div>
                    <hr>
                    <button v-on:click="addQuestion()" class="btn btn-success btn-sm">Add Question</button>
                    <div v-for="question in questionnaire.questions">
                        <div class="row animated slideInRight">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="row">
                                    <button v-on:click="removeQuestion(question)"
                                            class="btn btn-md btn-danger pull-right">
                                        Remove Question
                                    </button>
                                </div>
                                <div class="form-group">
                                    <label for="questionnaireName">Question Name</label>
                                    <input v-validate="'required'"
                                           :name="'Question Name' + questionnaire.questions.indexOf(question)"
                                           class="form-control" type="text"
                                           v-model="question.question">
                                    <span v-show="errors.has('Question Name' + questionnaire.questions.indexOf(question))"
                                          class="help is-danger text-danger">{{ errors.first('Question Name' + questionnaire.questions.indexOf(question)) }}</span>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" v-model="question.required" class="check">
                                    <label>Required</label>
                                </div>
                                <div class="form-group">
                                    <label for="">Answer Type</label>
                                    <select v-model="question.type" id="quesType" class="form-control"
                                            v-on:change="question.values = []">
                                        <option selected v-bind:value="'short'">Short Answer</option>
                                        <option v-bind:value="'long'">Long Answer</option>
                                        <option v-bind:value="'radio'">Multiple Choice</option>
                                        <option v-bind:value="'checkbox'">Checkboxes</option>
                                    </select>
                                </div>
                                <transition name="fade">
                                    <div v-if="question.type === 'radio'" class="form-group">
                                        <label for="">Radio Box Values</label>
                                        <button v-on:click="addValue(question)" class="btn btn-success btn-xs">Add Value
                                        </button>
                                        <div v-for="val in question.values">
                                            <div class="input-group animated fadeInUp">
                                                <input placeholder="Enter value..." class="form-control"
                                                       v-validate="'required'"
                                                       :name="'Q' + questionnaire.questions.indexOf(question) + ' Value Name ' + question.values.indexOf(val)"
                                                       type="text" v-model="val.value" required>
                                                <!--<span v-show="errors.has(question.values.indexOf(val))" class="help is-danger text-danger">{{ errors.first(question.values.indexOf(val)) }}</span>-->
                                                <span v-show="errors.has('Q' + questionnaire.questions.indexOf(question) + ' Value Name ' + question.values.indexOf(val))"
                                                      class="help is-danger text-danger">{{ errors.first('Q' + questionnaire.questions.indexOf(question) + ' Value Name ' + question.values.indexOf(val)) }}</span>

                                                <div class="input-group-btn">
                                                    <button v-on:click="removeValue(question, val)" type="button"
                                                            class="btn btn-danger"><i class="fa fa-times"
                                                                                      aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </transition>
                                <transition name="fade">
                                    <div v-if="question.type === 'checkbox'">
                                        <label for="">Check Box Values</label>
                                        <button v-on:click="addValue(question)" class="btn btn-success btn-xs">Add Value
                                        </button>
                                        <div v-for="val in question.values">
                                            <div class="input-group animated fadeInUp">
                                                <input placeholder="Enter value..." class="form-control"
                                                       v-validate="'required'"
                                                       :name="'Q' + questionnaire.questions.indexOf(question) + ' Value Name ' + question.values.indexOf(val)"
                                                       type="text" v-model="val.value" required>
                                                <!--<span v-show="errors.has(question.values.indexOf(val))" class="help is-danger text-danger">{{ errors.first(question.values.indexOf(val)) }}</span>-->
                                                <span v-show="errors.has('Q' + questionnaire.questions.indexOf(question) + ' Value Name ' + question.values.indexOf(val))"
                                                      class="help is-danger text-danger">{{ errors.first('Q' + questionnaire.questions.indexOf(question) + ' Value Name ' + question.values.indexOf(val)) }}</span>

                                                <div class="input-group-btn">
                                                    <button v-on:click="removeValue(question, val)" type="button"
                                                            class="btn btn-danger"><i class="fa fa-times"
                                                                                      aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </transition>

                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <hr>

                    </div>
                    <form ref="form" v-bind:action="action" method="post" @submit.prevent="validateBeforeSubmit">
                        <input name="json-values" type="hidden" v-bind:value="JSON.stringify(questionnaire)">
                        <input type="hidden" name="_token" v-bind:value="csrf_token">
                        <button class="fixed-button-1 btn btn-primary pull-right" type="submit"><span class="fa fa-check"></span> Submit</button>
                    </form>
                </div>
            </transition>

            <hr>
            <h5 class="page-header">For development (JSON passed to controller)</h5>
            <pre>{{ questionnaire }}</pre>
            <h6>{{ isOrdinance }} || {{ isResolution}}</h6>
        </div>
        <button type="button" class="btn btn-warning fixed-button-2" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-eye"></span> Preview
        </button>
        <div class="modal fade" id="modal-default" style="display: none;">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Questionnaire Preview</h4>
                    </div>
                    <div class="modal-body">
                       <div class="wrap">
                           <h1>{{ questionnaire.name }}</h1>
                           <p>{{ questionnaire.description }}</p>
                           <div v-for="question in questionnaire.questions">
                               <h2 class="page-header">{{ question.question }}</h2>
                               <input class="form-control" v-if="question.type === 'short'" type="text">
                               <textarea class="form-control" v-if="question.type === 'long'" cols="30"
                                         rows="10"></textarea>
                               <div v-for="val in question.values">
                                   <div v-if="question.type === 'radio'">
                                       <input type="radio"> {{ val.value }}
                                   </div>

                                   <div v-if="question.type === 'checkbox'">
                                       <input type="checkbox"> {{ val.value }}
                                   </div>
                               </div>
                           </div>
                           <div class="modal-footer">
                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                               <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                           </div>
                       </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
    </div>
</template>

<script>

    class Questions {

    }

    export default {
        props: {
            'action': String,
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
            validateBeforeSubmit() {
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
            addQuestion() {
                this.questionnaire.questions.push({
                    question: '',
                    required: false,
                    type: '',
                    values: []
                });
            },
            addValue(question) {
                question.values.push({value: ''});
            },
            removeQuestion(question) {
                this.questionnaire.questions.splice(this.questionnaire.questions.indexOf(question), 1);
            },
            removeValue(question, val) {
                question.values.splice(question.values.indexOf(val), 1);
            }
        },
        data() {
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
