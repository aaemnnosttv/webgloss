@extends('layouts.master')

@section('content')

    <h3>
        <span v-text="terms.length"></span> terms, and counting...
        <button @click="$broadcast('show-modal', 'new_term')" class="btn btn-info pull-right"><i class="fa fa-plus"></i></button>
    </h3>

    <term-table :terms="terms"></term-table>

    <modal id="new_term">
        <div slot="header"><h2>Define a new term</h2></div>
        <div slot="body">
            <form @submit.prevent="createTerm">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" v-model="newTerm.name">
                </div>
                <div class="form-group">
                    <label for="acronym">Acronym</label>
                    <input type="text" name="acronym" size="10" maxlength="10" class="form-control" v-model="newTerm.acronym">
                </div>
                <div class="form-group">
                    <label for="definition">Definition</label>
                    <textarea type="text" name="definition" class="form-control" v-model="newTerm.definition"></textarea>
                </div>

                <div class="form-group" v-show="newTerm.name && newTerm.definition">
                    <button type="submit" class="btn btn-primary btn-large">Submit</button>
                </div>
            </form>
        </div>
        <div slot="footer">aww yeah</slot>
    </modal>

@stop
