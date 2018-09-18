@extends('layouts.app')
@section('content')

    <div class="spacer">
        
    </div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" id="qien--background-colour">Gebruiker {{$profile->username}} verwijderen.</div>
                    <div class="panel-body" >Weet u het zeker?

                                <button type="submit" class="btn btn-primary" id="qien--background-colour">
                                    <i class="fa fa-btn fa-sign-in" ></i> verwijderen
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
