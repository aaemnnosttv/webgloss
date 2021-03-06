@extends('layouts.master')

@section('content')

    <h1>
        <span v-text="terms.length"></span> terms, and counting...
        <button v-on:click="termCreate" class="btn btn-info pull-right"><i class="fa fa-plus"></i></button>
    </h1>

    <div class="form-group">
        <input type="search" class="form-control" v-model="filter" placeholder="Filter terms">
    </div>
    <div class="filter-results" v-show="filter">
        Showing <kbd class="count" v-text="terms | filterBy filter in 'name' 'acronym' 'definition' | length"></kbd> Results
    </div>
    <hr>

    <term-table :terms="terms | filterBy filter in 'name' 'acronym' 'definition'"></term-table>

    <modal id="term_form">
        <div slot="header">
            <h2>Define a new term</h2>
            <alert v-for="error in errors" :show="!!error" state="danger" :message="error | toLines"></alert>
        </div>

        <div slot="body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" v-model="modalTerm.name">
            </div>
            <div class="form-group">
                <label for="acronym">Acronym</label>
                <input type="text" name="acronym" size="10" maxlength="10" class="form-control" v-model="modalTerm.acronym">
            </div>
            <div class="form-group">
                <label for="definition">Definition</label>
                <textarea type="text" name="definition" class="form-control" v-model="modalTerm.definition"></textarea>
            </div>
        </div>

        <div slot="footer">
            <div class="form-group">
                <button v-on:click="$broadcast('hide-modal','term_form')"
                        class="btn btn-secondary-outline"
                >Cancel</button>
                <button v-on:click="commitTerm"
                        class="btn btn-secondary btn-large"
                        :class="{ 'btn-primary': modalTerm.name && modalTerm.definition }"
                        :disabled="modalTerm.name && modalTerm.definition ? false : 'disabled'"
                >Submit</button>
            </div>
        </div>
    </modal>

@stop
