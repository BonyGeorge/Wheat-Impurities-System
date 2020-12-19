
<!DOCTYPE html>
<html>
<head>

 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sustaino | Edit Profile.</title>
    <link rel="icon" href=" 3.png">

  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>

 <div class="MiddleDiv">



<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header"  style="background-color: darkturquoise;color:black;">

<h4 class="modal-title" id="ModelLabel">Edit Profile</h4>
</div>


 <form method="POST" action="/profile/{{Auth::user()->id}}" enctype="multipart/form-data" style="margin: 15px">
    @csrf
    @method('PATCH')
    <center>
      @if(Auth::user()->filename == NULL)

      <img src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="Image" width="200cm" height="200cm">

      @else

      <img src="{{asset('storage/ProfilePicture/' .Auth::user()->filename)}}"   alt="Image" width="200cm" height="200cm">

      @endif
    </center> 
      <br>
     Name :  <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" pattern="[A-Za-z- ]{1,32}"><br>
     Email : <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}"><br>
     SSN :
     <div id="u22" class="ax_text_field">
      <input id="u22_input" class="ssn form-control" type="text" data-label="ssn1" maxlength="11" name="ssn" value="{{Auth::user()->ssn}}">
     </div><br>
     Address : <input type="text" class="form-control" name="address" value="{{Auth::user()->address}}" pattern ='[A-Za-z- ]{1,32}'><br>
     Phone : <input type="tel" class="form-control" name="phone" value="{{Auth::user()->phone}}" pattern=[0-9]{3}-[0-9]{3}-[0-9]{4}><br>
     Gender : <div class="col-md-15">
      <select class="form-control" name="isMale" required="required">
         <option value="1">Male</option>
         <option value="0">Female</option>
     </select>
 </div><br>

<br>
    Image: <span style="color: red"> *</span>
    <br><input type="file" name="filename" ><br><br>

      <br>                                                                    

      <div class="modal-footer">       
      <input type="submit" name="Save Edits" value="Save Edits" class = "btn btn-primary">
      </div>


  </form>

</div>
</div>

</body>
</html>
  <!-- jQuery -->
  <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>

<script>
  // SSN validation
// trap keypress - only allow numbers
$('input.ssn').on('keypress', function(event){
    // trap keypress
    var character = String.fromCharCode(event.which);
    if(!isInteger(character)){
        return false;
    }    
});

// checks that an input string is an integer, with an optional +/- sign character
function isInteger (s) {
    if(s === '-') return true;
   var isInteger_re     = /^\s*(\+|-)?\d+\s*$/;
   return String(s).search (isInteger_re) != -1
}

// format SSN 
$('input.ssn').on('keyup', function(){
   var val = this.value.replace(/\D/g, '');
   var newVal = '';
    if(val.length > 4) {
        this.value = val;
    }
    if((val.length > 3) && (val.length < 6)) {
        newVal += val.substr(0, 3) + '-';
        val = val.substr(3);
    }
    if (val.length > 5) {
        newVal += val.substr(0, 3) + '-';
        newVal += val.substr(3, 2) + '-';
        val = val.substr(5);
    }
    newVal += val;
    this.value = newVal;   
});

</script>