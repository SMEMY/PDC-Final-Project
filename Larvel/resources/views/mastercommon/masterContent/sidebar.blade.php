 <!-- Sidebar -->
 <div class="sidebar" id="sidebar">
     <div class="sidebar-inner slimscroll">
         <div id="sidebar-menu" class="sidebar-menu">
             <ul>
                 <li class="menu-title">
                     <span>اصلي مېنو</span>
                 </li>
                 <li class="">
                     <a href="/user/materials/{{ $programs[0]->id }}"> <span> درسي مواد </span> <i
                             class="la la-book"></i> </span></a>
                 </li>
                 <li class="">
                     <a href="/user/feedbackAnswer/{{ $programs[0]->id }}"> <span> د پروګرام اړونده ارزونه</span> <i
                             class="fa fa-pencil-square-o"></i> </span></a>
                 </li>

                 @if ($u_role === 2)
                     <li class="">
                         <a href="/user/facilitatorMaterials/{{ $programs[0]->id }}"> <span> د پروګرام لپاره مواد
                                 پورته
                                 کول</span> <i class="fa fa-upload"></i> </span></a>
                     </li>
                 @endif

             </ul>
         </div>
     </div>
 </div>
 <!-- /Sidebar -->
