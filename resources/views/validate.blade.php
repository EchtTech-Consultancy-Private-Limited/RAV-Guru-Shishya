@extends('layouts.app-file')
@section('content')

<style>
    :root {
  --box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
  --blue: #003057;
  --orange: #f15a2d;
  --border-color: #d3c4c4;
  --white: #fff;
  --em-1: 1em;
  --font-size: 12px;
}

body {
  margin: 0;
  display: flex;
  min-height: 100vh;
  font-family: system-ui;
}

body.modal-open {
  overflow-y: hidden;
}

/* main */
.container {
  display: flex;
  flex-direction: column;
  width: 400px;
  padding: var(--em-1);
  box-shadow: var(--box-shadow);
  margin: var(--em-1) auto;
  height: 100%;
  border-radius: 10px;
}

.logo {
  display: flex;
  flex-direction: column;
}

.logo img {
  width: 100px;
  height: auto;
  margin: 0 auto;
  cursor: pointer;
}

.container>.form-container {
  display: flex;
  flex-direction: column;
}

.container>.form-container .-account-container {
  margin-top: 0.5em;
}

.container>.form-container .-account-container>.title {
  margin: 0.5em 0;
  color: var(--blue);
  text-align: center;
  font-weight: 700;
  font-size: 14px;
  display: block;
}

.container>.form-container .-account-container>.tab {
  text-align: center;
  width: 30%;
  display: flex;
  justify-content: space-evenly;
  margin: 0.5em auto;
}

.container>.form-container .-account-container>.tab .tab-item {
  display: flex;
  border: none;
  background: transparent;
  cursor: pointer;
  color: var(--blue);
  font-weight: 600;
  font-size: var(--font-size);
}

.container>.form-container .-account-container>.tab .tab-item.active {
  border-bottom: 2px solid var(--orange);
}

.container>.form-container>.form .-account-container>.row {
  display: flex;
  flex-direction: column;
  width: 100%;
  margin-bottom: 0.75em;
}

.container>.form-container>.form .-account-container>.form-group {
  flex-direction: row;
  justify-content: space-between;
}

.container>.form-container>.form .-account-container>.row>.col {
  width: 48%;
}

.container>.form-container>.form .-account-container>.row>.col-1 {
  margin-right: 0.25em;
}

.container>.form-container>.form .-account-container>.row>.col-2 {
  margin-left: 0.25em;
}

.container>.form-container>.form .terms {
  text-align: start;
  font-size: 10px;
  font-weight: 600;
}

.container>.form-container>.form .actions {
  display: flex;
  justify-content: space-between;
  margin-top: 0.5em;
}

.container>.form-container>.form .actions>input {
  font-size: var(--font-size);
  width: 100px;
  border-radius: 0.5em;
  height: 30px;
  border: 1.25px solid;
  cursor: pointer;
}

.container>.form-container>.form .actions>.cancel {
  background: var(--white);
  color: var(--blue);
}

.container>.form-container>.form .actions>.cancel:hover,
.container>.form-container>.form .actions>.submit:hover {
  border: 1.5px solid var(--blue);
}

.container>.form-container>.form .actions>.submit {
  background: var(--blue);
  color: var(--white);
}

input,
select,
textarea {
  height: 30px;
  border-radius: 5px;
  border: 1px solid var(--border-color);
  padding-left: 0.75em;
  font-size: var(--font-size);
}

select {
  height: 33px;
  padding-left: 0.25em;
}

input::placeholder,
textarea::placeholder,
.placeholder,
select:invalid {
  font-size: 10px;
  color: gray;
  padding: 0.15em;
  font-family: Arial, Helvetica, sans-serif
}

input:focus {
  outline-color: var(--blue);
}

option {
  font-size: var(--font-size);
}

textarea {
  resize: none;
}

label.error {
  font-size: 10px;
  color: var(--orange);
  font-weight: 500;
  display: flex;
  margin: 1px;
}

input.error,
select.error {
  border: 1.5px solid var(--orange);
}

.fill-w {
  width: -webkit-fill-available;
}

/* response container */
.repsonse-container {
  display: flex;
  flex-direction: column;
  margin: var(--em-1) auto;
  align-items: center;
}

.repsonse-container>.message {
  display: flex;
  flex-direction: column;
  align-items: center;
  color: var(--blue);
  font-weight: 500;
}

.repsonse-container>.message > * {
  text-align: center;
}

@media screen and (max-width: 320px) {
  .container {
    width: 100%;
    margin: 0;
  }

  .container>.logo img {
    width: 60vw;
  }

  .container>.form-container>.form .-account-container>.row {
    flex-direction: column;
  }

  .container>.form-container>.form .-account-container>.row>.col {
    width: 100%;
  }

  .container>.form-container>.form .-account-container>.row>.col-1 {
    margin-right: 0;
  }

  .container>.form-container>.form .-account-container>.row>.col-2 {
    margin-left: 0;
    margin-top: 0.75em;
  }
}

.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4);
  backdrop-filter: brightness(0.6);
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 30vw;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style><br><br>
  <section style="margin-left:400px;">
  <div class="container">
    
    
      <form id="form" class="forwwm" >
        
          
         
          <div class="row">
            <input class="fill-w" id="companyAccount" name="companyAccount" type="text"
              placeholder=" Company Account Number*" required>
          </div>
          <div class="row">
            <input class="fill-w" id="companyName" name="companyName" type="text" placeholder="Company Name*" required>
          </div>
          <div class="row">
            <input class="fill-w" id="salesRepName" name="salesRepName" type="text"
              placeholder=" Sales Representative Name*" required>
          </div>
     
       
       
        <div class="actions">
          <input class="cancel" type="button" value="Cancel" onclick="cancel()">
          <input class="submit" type="submit" value="Submit" onSubmit="submitForm()">
        </div>
      </form>
   
  </div>
  
</section>

<script src="{{ asset('assets/js/custom/validate.js') }}"></script>
  
@endsection