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
        min-width: 120px;
        position: fixed;
        /*bottom: 18vh;*/
        /*right: 7%;*/
        bottom: 0;
        right: 98px;
        margin-bottom: 108px;
    }

    /** preview **/
    .fixed-button-2 {
        min-width: 120px;
        position: fixed;
        /*bottom: 18vh;*/
        /*right: 14%;*/
        bottom: 43px;
        right: 98px;
        margin-bottom: 108px;
    }

    /** Add Questions**/
    .fixed-button-3 {
        min-width: 120px;
        position: fixed;
        /*bottom: 18vh;*/
        /*right: 14%;*/
        bottom: 85px;
        right: 98px;
        margin-bottom: 108px;
    }

    .content {
        height: 100%;
    }

    .modal-body div.wrap {
        margin: 5%;
    }

    .values-added-margin {
        margin: 8px 0;
    }

    .value-group {
        padding-left: 3%;
    }
</style>

<template>
    <div class="box-body">
        <div class="col-md-9 content">
            <!--<div class="form-group" v-if="this.isOrdinance">-->
            <!--<label>Associated Ordinance</label>-->
            <!--<select class="form-control" v-model="questionnaire.associatedOrdinance">-->
            <!--<option v-for="ordinance in oor" v-bind:value="ordinance.id">{{ ordinance.title }}</option>-->
            <!--</select>-->
            <!--</div>-->
            <!--<div class="form-group" v-if="this.isResolution">-->
            <!--<label>Associated Resolution</label>-->
            <!--<select class="form-control" v-model="questionnaire.associatedResolution">-->
            <!--<option v-for="resolution in oor" v-bind:value="resolution.id">{{ resolution.title }}</option>-->
            <!--</select>-->
            <!--</div>-->
            <transition name="fade">
                <div v-if="this.questionnaire.associatedResolution || this.questionnaire.associatedOrdinance">
                    <div class="form-group">
                        <!--<label for="questionnaireName">Questionnaire Name</label>-->
                        <h3 v-if="questionnaire.associatedOrdinance">{{ questionnaire.associatedOrdinance.title }}</h3>
                        <h3 v-if="questionnaire.associatedResolution">{{ questionnaire.associatedResolution.title }}</h3>

                        <!--<input v-validate="'required'" name="name" class="form-control" id="questionnaireName"-->
                        <!--v-model="questionnaire.name" type="text"-->
                        <!--placeholder="Questionnaire Name...">-->
                        <!--<span v-show="errors.has('name')"-->
                        <!--class="help is-danger text-danger">{{ errors.first('name') }}</span>-->
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" v-model="questionnaire.description" id="" cols="30"
                                  rows="10"></textarea>
                    </div>
                    <hr>
                    <button v-on:click="addQuestion()" class="btn btn-success btn-md fixed-button-3"><span class="fa fa-plus"></span> Add Question
                    </button>
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
                                    <label>Question Name</label>
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
                                            v-on:change="checkType(question)">
                                        <option selected v-bind:value="'short'">Short Answer</option>
                                        <option v-bind:value="'long'">Long Answer</option>
                                        <option v-bind:value="'radio'">Multiple Choice</option>
                                        <option v-bind:value="'checkbox'">Checkboxes</option>
                                        <option v-bind:value="'conditional'">Yes/No</option>
                                    </select>
                                </div>
                                <div class="value-group">
                                    <transition name="fade">
                                        <div v-if="question.type === 'conditional'" class="form-group">
                                            <label for="">Conditional Yes/No</label>
                                            <p class="text-danger">Optional: Check the box to collect "Reason"</p>
                                            <!--<button v-on:click="addValue(question)" class="btn btn-success btn-xs">Add Value-->
                                            <!--</button>-->
                                            <div v-for="val in question.values">
                                                <!--<div v-if="question.values.indexOf(val) === question.values.length - 1">-->
                                                <!--<p>Why (i.e. Yes. Because...)</p>-->
                                                <!--</div>-->
                                                <div class="values-added-margin">
                                                    <div class="animated fadeInUp">
                                                        <input type="checkbox"
                                                               v-on:change="conditionalChecked(val, val.value)">
                                                        <!--<input placeholder="Enter value..." class="form-control"-->
                                                        <!--v-validate="'required'"-->
                                                        <!--:name="'Q' + questionnaire.questions.indexOf(question) + ' Value Name ' + question.values.indexOf(val)"-->
                                                        <!--type="text" v-model="val.value" required>-->
                                                        <label>{{ val.value.replace(';1','')}}</label>
                                                    </div>
                                                    <!--<span v-show="errors.has('Q' + questionnaire.questions.indexOf(question) + ' Value Name ' + question.values.indexOf(val))"-->
                                                    <!--class="help is-danger text-danger">{{ errors.first('Q' + questionnaire.questions.indexOf(question) + ' Value Name ' + question.values.indexOf(val)) }}</span>-->

                                                </div>
                                            </div>
                                            <!--<div v-for="val in question.values">-->
                                            <!--<div class="values-added-margin">-->
                                            <!--<div class="input-group animated fadeInUp">-->
                                            <!--<input placeholder="Enter value..." class="form-control"-->
                                            <!--v-validate="'required'"-->
                                            <!--:name="'Q' + questionnaire.questions.indexOf(question) + ' Value Name ' + question.values.indexOf(val)"-->
                                            <!--type="text" v-model="val.value" required>-->
                                            <!--&lt;!&ndash;<span v-show="errors.has(question.values.indexOf(val))" class="help is-danger text-danger">{{ errors.first(question.values.indexOf(val)) }}</span>&ndash;&gt;-->

                                            <!--<div class="input-group-btn">-->
                                            <!--<button v-on:click="removeValue(question, val)" type="button"-->
                                            <!--class="btn btn-danger"><i class="fa fa-times"-->
                                            <!--aria-hidden="true"></i>-->
                                            <!--</button>-->
                                            <!--</div>-->
                                            <!--</div>-->
                                            <!--<span v-show="errors.has('Q' + questionnaire.questions.indexOf(question) + ' Value Name ' + question.values.indexOf(val))"-->
                                            <!--class="help is-danger text-danger">{{ errors.first('Q' + questionnaire.questions.indexOf(question) + ' Value Name ' + question.values.indexOf(val)) }}</span>-->

                                            <!--</div>-->
                                            <!--</div>-->
                                        </div>
                                    </transition>
                                    <transition name="fade">
                                        <div v-if="question.type === 'radio'" class="form-group">
                                            <label for="">Radio Box Values</label>
                                            <button v-on:click="addValue(question)" class="btn btn-success btn-xs">Add
                                                Value
                                            </button>
                                            <div v-for="val in question.values">
                                                <div class="values-added-margin">
                                                    <div class="input-group animated fadeInUp">
                                                        <input placeholder="Enter value..." class="form-control"
                                                               v-validate="'required'"
                                                               :name="'Q' + questionnaire.questions.indexOf(question) + ' Value Name ' + question.values.indexOf(val)"
                                                               type="text" v-model="val.value" required>
                                                        <!--<span v-show="errors.has(question.values.indexOf(val))" class="help is-danger text-danger">{{ errors.first(question.values.indexOf(val)) }}</span>-->

                                                        <div class="input-group-btn">
                                                            <button v-on:click="removeValue(question, val)"
                                                                    type="button"
                                                                    class="btn btn-danger"><i class="fa fa-times"
                                                                                              aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <span v-show="errors.has('Q' + questionnaire.questions.indexOf(question) + ' Value Name ' + question.values.indexOf(val))"
                                                          class="help is-danger text-danger">{{ errors.first('Q' + questionnaire.questions.indexOf(question) + ' Value Name ' + question.values.indexOf(val)) }}</span>

                                                </div>
                                            </div>
                                        </div>
                                    </transition>
                                    <transition name="fade">
                                        <div v-if="question.type === 'checkbox'">
                                            <label for="">Check Box Values</label>
                                            <button v-on:click="addValue(question)" class="btn btn-success btn-xs">Add
                                                Value
                                            </button>
                                            <div v-for="val in question.values">
                                                <div class="values-added-margin">
                                                    <div class="input-group animated fadeInUp">
                                                        <input placeholder="Enter value..." class="form-control"
                                                               v-validate="'required'"
                                                               :name="'Q' + questionnaire.questions.indexOf(question) + ' Value Name ' + question.values.indexOf(val)"
                                                               type="text" v-model="val.value" required>
                                                        <!--<span v-show="errors.has(question.values.indexOf(val))" class="help is-danger text-danger">{{ errors.first(question.values.indexOf(val)) }}</span>-->

                                                        <div class="input-group-btn">
                                                            <button v-on:click="removeValue(question, val)"
                                                                    type="button"
                                                                    class="btn btn-danger"><i class="fa fa-times"
                                                                                              aria-hidden="true"></i>
                                                            </button>
                                                        </div>

                                                    </div>
                                                    <span v-show="errors.has('Q' + questionnaire.questions.indexOf(question) + ' Value Name ' + question.values.indexOf(val))"
                                                          class="help is-danger text-danger">{{ errors.first('Q' + questionnaire.questions.indexOf(question) + ' Value Name ' + question.values.indexOf(val)) }}</span>

                                                </div>
                                            </div>
                                        </div>
                                    </transition>
                                </div>

                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <hr>

                    </div>
                    <form ref="form" v-bind:action="action" method="post" @submit.prevent="validateBeforeSubmit">
                        <input type="hidden" name="_method" value="PATCH">
                        <input name="json-values" type="hidden" v-bind:value="JSON.stringify(questionnaire)">
                        <input type="hidden" name="_token" v-bind:value="csrf_token">
                        <button class="fixed-button-1 btn btn-primary pull-right" type="submit"><span
                                class="fa fa-check"></span> Submit
                        </button>
                    </form>
                </div>
            </transition>

            <!--<hr>-->
            <!--<h5 class="page-header">For development (JSON passed to controller)</h5>-->
            <!--<pre>{{ questionnaire }}</pre>-->
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
                            <h3 v-if="questionnaire.associatedOrdinance">{{ questionnaire.associatedOrdinance.title }}</h3>
                            <h3 v-if="questionnaire.associatedResolution">{{ questionnaire.associatedResolution.title }}</h3>
                            <p>{{ questionnaire.description }}</p>
                            <div v-for="question in questionnaire.questions">
                                <h2 class="page-header">{{ question.question }}</h2>
                                <input class="form-control" v-if="question.type === 'short'" type="text">
                                <textarea class="form-control" v-if="question.type === 'long'" cols="30"
                                          rows="10"></textarea>
                                <div v-for="val in question.values">
                                    <div v-if="question.type === 'radio'">
                                        <input :name="'radiovalue:' + questionnaire.questions.indexOf(question)" type="radio"> {{ val.value }}
                                    </div>
                                    <div v-if="question.type === 'conditional'">
                                        <input type="radio" name="questionnaire.questions.indexOf(question)"
                                               v-model="question.checked" :value="val.value"> {{ val.value.replace(';1','') }}
                                        <div style="padding-left: 50px;">
                                            <transition name="fade">
                                                <input style="border-top: none; border-left: none; border-right: 0" placeholder="Reason..." type="text" v-if="val.value.endsWith(';1') && val.value === question.checked" class="form-control">
                                            </transition>
                                        </div>

                                        <!--<span v-if="question.values.indexOf(val) === question.values.length - 1">-->
                                        <!--<input class="form-control" type="text">-->
                                        <!--</span>-->
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
            'ordinance': String,
            'resolution': String,
            'flag': String,
            'old': String
        },
        mounted() {

            console.log('Component mounted.')
            // console.log(this.data);
            console.log('----here----');
            console.log('ORDINANCE', this.ordinance);
            console.log('RESOLUTION', this.resolution);
            // this.data = JSON.parse(this.data);
            console.log(typeof this.ordinance);

        },
        methods: {
            flipConditional(valueObject) {
                alert(JSON.stringify(valueObject));
                valueObject.checked = !valueObject.checked;
            },
            conditionalChecked(valObject, currentValue) {
                if (valObject.value.endsWith(";1")) {
                    if (valObject.value.startsWith('Yes')) {
                        valObject.value = 'Yes';
                    }
                    if (valObject.value.startsWith('No')) {
                        valObject.value = 'No';
                    }
                } else {
                    valObject.value = valObject.value + ';1';
                }
            },
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
            },
            checkType(q) {
                q.values = [];
                if (q.type === 'conditional') {
                    q.values.push({value: "Yes", checked: false});
                    q.values.push({value: "No", checked: false});
                    // q.values.push({value: "If [Yes/No]. Why?"});
                } else {
                }
            }
        },
        data() {
            return {
                hello: 'Hello World from a Vue.js Component',
                // isOrdinance: this.flag === 'ordinances',
                // isResolution: this.flag === 'resolutions',
                questionnaire: JSON.parse(this.old)
            }
        }

    }
</script>
