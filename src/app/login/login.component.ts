import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth.service'
import { Router } from '@angular/router'
import { UserService } from '../user.service'

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.sass']
})
export class LoginComponent implements OnInit {

  constructor(private Auth: AuthService, private router: Router, private user: UserService) { }

  ngOnInit() {
  }

  loginUser(event){

    const coef = '5BY**246f6b36f6b87jH'

    event.preventDefault()
    const target = event.target
    var usrname = target.querySelector('#username').value
    var psswordd = target.querySelector('#password').value
    const capt = target.querySelector('#capt').value

    const username = this.user.verifIn(usrname)
    const passwordd = this.user.verifIn(psswordd)

    if((username==0)|(passwordd==0)){
      window.alert('no')
      return
    }

    var hexa = '';

    var charz ="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"

    for(var i=0;i<passwordd.length;i++) {
      hexa += passwordd.charCodeAt(i).toString(16)
    }

    hexa += coef
    var psd = ''
    for(i=0;i<hexa.length;i++){

      var a = charz.substr(Math.floor(Math.random()*62),1)
      psd+=a
      a = charz.substr(Math.floor(Math.random()*62),1)
      psd+=a
      psd+=hexa[i]

    }

    const password = psd //hexa

    if (capt==='b'){
      this.Auth.getUserDetails(username, password).subscribe(data => {
        if(data.success){
          // redir to /admin
          if(username=="supuz"){
            this.router.navigate(['dash87675'])
            this.Auth.setLoggedIn(true)
          }
          else{
            this.router.navigate(['admin'])
            //this.Auth.setLoggedIn(true)
            this.Auth.setLoggedIn(false)
          }
        } else {
        window.alert(data.message)
      }
      })
    }
    else{
      window.alert('la réponse est b')
    }
  }
}
