@extends('gosford.layouts.template')
@section('content')
    <div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
        @include('gosford.system.header')
        <main class="mdl-layout__content" style="background: rgb(247, 246, 246);flex-direction: column;">
            <div class="step-order">
            <div class="title-step-order active-step">
                <button  class="btn-step mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red" data-upgraded=",MaterialButton,MaterialRipple">
                <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(78px, 4px);"></span></span>
                </button>
                <p>Select vehicle</p>
             </div>
             <div class="title-step-order">
                <button class="btn-step mdl-button mdl-js-button mdl-button--raised button--colored-light-blue" disabled="" data-upgraded=",MaterialButton"></button>
                <p>Choose design</p>
             </div>

             <div class="title-step-order">
                <button class="btn-step mdl-button mdl-js-button mdl-button--raised button--colored-light-blue" disabled="" data-upgraded=",MaterialButton"></button>
                <p>Options Summary</p>
             </div>
            </div>
            <div class="title-order">
                <h3>Select Vehicle</h3>

            </div>

            <form action="{{route('gosford.choice_design')}}" method="post">@csrf
                <div class="body-order">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <select class="select2 mdl-textfield__input" type="text" name="carmake">
                            <option value="">Car Make</option>
                            @foreach($brand as $i => $b)
                             <option value="{{$b->id}}">{{$b->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <br>
                        <select class="select2 mdl-textfield__input" type="text" name="model">
                            <option value="">Car Model</option>
                            @foreach($typecar as $i => $t)
                             <option value="{{$t->id}}">{{$t->type}}</option>
                            @endforeach
                        </select>
                        <br>
                        <br>
                        <select class="select2 mdl-textfield__input" type="text" name="year">
                            <option value="">Year</option>
                            @for ($i = 1994; $i <= date('Y'); $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                        </select>

                    </div>

                </div>
                <center>

                    <button type="submit" style="padding: 0px 30px;" type="submit" class="mdl-button mdl-js-button mdl-button--raised color--gray">
                        Search
                    </button>

                </center>
            </form>


        </main>
    </div>
@endsection
