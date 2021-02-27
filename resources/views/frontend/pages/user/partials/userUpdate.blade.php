<div class="modal fade" id="updateProfile" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="main-mailposi"> <span class="fa fa-envelope-o" aria-hidden="true"></span> </div>
                <div class="modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Update Info</h3>
                    <form method="POST" action="{{ route('user.update',Auth::user()->id )}}">
                         @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" value="{{ Auth::user()->name }}" class="form-control" name="name">
                   
                                     </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" value={{ Auth::user()->email }} class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"> @error('email') <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                     </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Address') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" value="{{ Auth::user()->phone }}" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone"> @error('phone') <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror 
                                    </div>
                        </div>
                        <div class="form-group row">
                            <label for="division" class="col-md-4 col-form-label text-md-right">{{ __('Division') }}</label>
                            <div class="col-md-6">
                                <select name="division_id" class="form-control">
                                    <option value="">Select Division</option>
                       
                                   
                                    @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}" {{ $division->id==Auth::user()->division_id ? 'selected' : '' }}>{{ $division->division_name }}</option>
                                    @endforeach
                   
                       
                             
                                </select> @error('division_id') <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror 
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="district" class="col-md-4 col-form-label text-md-right">{{ __('District') }}</label>
                            <div class="col-md-6">
                                <select name="district_id" class="form-control">
                                    <option value="">Select District</option>
                       
                            
                                    @foreach ($districts as $district)
                                    <option value="{{ $district->id }}" {{ $district->id==Auth::user()->district_id ? 'selected' : '' }}>{{ $district->district_name }}</option>
                    
                                    @endforeach
                
                                </select> 
                                @error('district_id') <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> 
                                    @enderror 
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="avatar"> @error('avatar') <span class="invalid-feedback" role="alert">
                                     
                                    <strong>{{ $message }}</strong>
                                    </span> 
                                    @enderror
                                   
                                 </div>
                                 @php $image = Auth::user()->avatar; @endphp
                                 <img src="{{ asset('upload/user/'.$image) }}" alt="" width="50px" style="border-radius:50%;float:right"> 

                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password"> @error('password') <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror 
                                    </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password"> </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary"> {{ __('Register') }} </button>
                            </div>
                        </div>
                    </form>
                </div>
                <p> <a href="#">By clicking register, I agree to your terms</a> </p>
            </div>
        </div>
    </div>
    <!-- //Modal content-->
</div>