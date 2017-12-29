import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

import { MailSenderRoutingModule } from './mail-sender-routing.module';
import { MailSenderComponent } from './mail-sender.component';
import { MailSenderService } from 'app/layout/mail-sender/mail-sender.service';
@NgModule({
  imports: [
    CommonModule,
    MailSenderRoutingModule,
    NgbModule,
    FormsModule
  ],
  providers: [MailSenderService],
  declarations: [MailSenderComponent]
})
export class MailSenderModule { }
