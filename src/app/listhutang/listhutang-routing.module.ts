
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ListhutangPage } from './listhutang.page';

const routes: Routes = [
  {
    path: '',
    component: ListhutangPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ListhutangPageRoutingModule {}






/* End of file  */

/* Created at 2022-12-06 15:16:59 */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */