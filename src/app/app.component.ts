import { Component } from '@angular/core';
import { RecordsService } from './records.service'
import { Title }     from '@angular/platform-browser'


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.sass']
})
export class AppComponent {


    rec = []
// one constructor only
    constructor(private jeuxDispo : RecordsService,private titleService: Title) {}


  ngOnInit(){
    // get the records from the database using the function getData from records.service.ts specify in those imports
    this.jeuxDispo.getData().subscribe(data =>{

          this.rec = data.obj
          //the form of the object is as this don't ask too much questions and follow back the imports
        })
  }

}
