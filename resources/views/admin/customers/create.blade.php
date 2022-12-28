@extends('admin.layouts.app')

@section('content')

    <section class="section is-title-bar">
        <div class="level">
            <div class="level-left">
                <div class="level-item">
                    <ul>
                        <li>Admin</li>
                        <li>Customer</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="hero is-hero-bar">
        <div class="hero-body">
            <div class="level">
                <div class="level-left">
                    <div class="level-item"><h1 class="title">
                            Create Customer
                        </h1></div>
                </div>
                <div class="level-right" style="display: none;">
                    <div class="level-item"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section is-main-section">
        <div class="card">

            <div class="card-content">
                <form method="post" action="{{ route('admin.customers.create.post') }}">
                    @csrf
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">First Name</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control is-expanded has-icons-left">
                                    <input class="input" name="first_name"  type="text" value="{{ old('first_name') }}" placeholder="First Name">
                                    <span class="icon is-small is-left"><i class="mdi mdi-note"></i></span>
                                </p>

                                @if($errors->has('first_name'))
                                    <p class="help is-danger">{{ $errors->first('first_name') }}</p>
                                @endif

                            </div>

                        </div>
                    </div>


                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">Last Name</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control is-expanded has-icons-left">
                                    <input class="input" name="last_name"  type="text" value="{{ old('last_name') }}" placeholder="Last Name">
                                    <span class="icon is-small is-left"><i class="mdi mdi-note"></i></span>
                                </p>

                                @if($errors->has('last_name'))
                                    <p class="help is-danger">{{ $errors->first('last_name') }}</p>
                                @endif

                            </div>

                        </div>
                    </div>


                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">Email</label>
                        </div>
                        <div class="field-body">
                            <div class="field is-expanded">
                                <div class="field has-addons">
                                    <p class="control is-expanded has-icons-left">
                                        <input class="input" type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                        <span class="icon is-small is-left"><i class="mdi mdi-web"></i></span>

                                    </p>
                                </div>


                                @if($errors->has('email'))
                                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                                @endif

                            </div>
                        </div>
                    </div>



                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">Password</label>
                        </div>
                        <div class="field-body">
                            <div class="field is-expanded">
                                <div class="field has-addons">
                                    <p class="control is-expanded has-icons-left">
                                        <input class="input" type="password" id="password" name="password"  placeholder="Password">
                                        <span class="icon is-small is-left"><i class="mdi mdi-textbox-password"></i></span>

                                    </p>

                                </div>

                                @if($errors->has('password'))
                                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                                @endif

                            </div>
                        </div>
                    </div>


                    <hr>
                    <div class="field is-horizontal">
                        <div class="field-label">
                            <!-- Left empty for spacing -->
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="field is-grouped">
                                    <div class="control">
                                        <button type="submit" class="button is-primary">
                                            <span>Submit</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
