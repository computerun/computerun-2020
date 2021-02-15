<h4> Name </h4>
<input name="Name" class=inputField id=name type="text" placeholder="Name" value="{{ old('Name') }}" />
<span>
    @error('Name')
    <div class=errorMessage>{{$message}}</div>
    @enderror
</span>

<h4> University </h4>
<input name="University" class=inputField id=university type="text" placeholder="University" value="{{ old('University') }}" />
<span>
    @error('University')
    <div class=errorMessage>{{$message}}</div>
    @enderror
</span>

<h4> NIM (Binusian only)</h4>
<input name="NIM" class=inputField id=nim type="text" placeholder="If you aren't Binusian fill -" value="{{ old('NIM') }}" />
<span>
    @error('NIM')
    <div class=errorMessage>{{$message}}</div>
    @enderror
</span>

<h4> Line ID </h4>
<input name="LineID" class=inputField id=lineID type="text" placeholder="Line ID" value="{{ old('LineID') }}" />
<span>
    @error('LineID')
    <div class=errorMessage>{{$message}}</div>
    @enderror
</span>

<h4> Phone Number </h4>
<input name="PhoneNumber" class=inputField id=hp type="text" placeholder="Phone Number" value="{{ old('PhoneNumber') }}" />
<span>
    @error('PhoneNumber')
    <div class=errorMessage>{{$message}}</div>
    @enderror
</span>

<h4> Email </h4>
<input name="Email" class=inputField id=email type="email" placeholder="Email" value="{{ old('Email') }}" />
<span>
    @error('Email')
    <div class=errorMessage>{{$message}}</div>
    @enderror
</span>