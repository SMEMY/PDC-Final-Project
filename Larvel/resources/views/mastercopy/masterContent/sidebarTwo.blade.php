 <!-- Sidebar -->
 <div class="sidebar" id="sidebar">
     <div class="sidebar-inner slimscroll">
         <div id="sidebar-menu" class="sidebar-menu">
             <ul>
                 <li class="menu-title text-white" style="font-size:20px;">
                     <span>اصلي مېنو</span>
                 </li>
                 <li class="submenu">
                     <a href="#" class="active"> <span>کړني</span> <i class="fa fa-pencil-square-o text-white"
                             style="font-size:30px;"></i>
                         <span class="menu-arrow"></span></a>
                     <ul style="display: none;">
                         <li class="submenu">
                             <a href="#" class="" onclick="audio.play()"><span> معلومات ثبتول</span> <span
                                     class="menu-arrow"></span> <i class="fa fa-database text-primary" aria-hidden="true" style="font-size:25px;"></i></a>
                             <ul style="display: none;">
                                 <li><a href="/admin/pdcProgramAttendance/{{ $programs->id }}"
                                         onclick="audio.play()">حاضري <i class="fa fa-wpforms text-success" aria-hidden="true"></i></a></li>
                                 <li><a href="/admin/pdcProgramPhoto/{{ $programs->id }}"
                                         onclick="audio.play()">متفرقه <i class="fa fa-picture-o text-success" aria-hidden="true"></i></a></li>
                                 <li><a href="/admin/storeMaterials/{{ $programs->id }}" onclick="audio.play()">درسي
                                         مواد <i class="fa fa-upload text-success" aria-hidden="true"></i></a></li>
                                 <li><a href="/admin/feedbackFormInsertion/{{ $programs->id }}"
                                         onclick="audio.play()">ارزونه <i class="fa fa-wpforms text-success" aria-hidden="true"></i> </a></li>
                             </ul>
                         </li>
                         <li class="submenu">
                             <a href="#" class="" onclick="audio.play()"><span>معلومات کتل</span> <span
                                     class="menu-arrow"></span> <i class="fa fa-file text-primary" aria-hidden="true" style="font-size:25px;"></i></a>
                             <ul style="display: none;">
                                 <li><a href="/admin/facilitatorProfileForProgram/{{ $program_id }}"
                                         onclick="audio.play()">تسهیلونکی <i class="fa fa-user  text-info"
                                             aria-hidden="true"></i></a> </li>
                                 <li><a href="/admin/specificeProgramParticipants/{{ $programs->id }}"
                                         onclick="audio.play()">ګډونوال <i class="fa fa-users text-info"
                                             aria-hidden="true"></i></a></li>
                                 <li><a href="/admin/pdcProgramAttendancePaper/{{ $programs->id }}"
                                         onclick="audio.play()">سوبتیا پاڼه <i class="fa fa-file text-info"
                                             aria-hidden="true"></i></a></li>
                                 <li><a href="/admin/pdcProgramAttendanceReport/{{ $programs->id }}"
                                         onclick="audio.play()">سوبتیا راپور <i class="fa fa-file text-info"
                                             aria-hidden="true"></i></a></li>
                                 <li><a href="/admin/feedback/{{ $programs->id }}" onclick="audio.play()">ارزون
                                         پاڼه <i class="fa fa-wpforms text-info" aria-hidden="true"></i></a></li>
                                 <li><a href="/admin/pdcProgramFeedbackReport/{{ $programs->id }}"
                                         onclick="audio.play()">ارزوني راپور <i class="fa fa-file text-info"
                                             aria-hidden="true"></i></a></li>
                                 <li><a href="/admin/materials/{{ $programs->id }}" onclick="audio.play()">تدریسي
                                         مواد <i class="fa fa-download text-info" aria-hidden="true"></i></a> </li>
                             </ul>
                         </li>
                     </ul>

                 </li>

             </ul>
         </div>
     </div>
 </div>
 <!-- /Sidebar -->
