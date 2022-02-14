	<!-- Sidebar -->
    <div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="menu-title text-white" style="font-size:20px;">
							<span>اصلي مېنو</span>
						</li>
						<li class="submenu">
							<a href="#"> <span> پروګرامونه</span> <i class="fa fa-pencil-square-o" style="font-size:20px;"></i> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<!-- <li><a class="active" href="test">پروګرامونه</a></li> -->

								<li class="submenu">
									<a href="#" class="active"><span> پروګرام ثبتول</span> <span class="menu-arrow"></span></a>
									<ul style="display: none;">
										<li><a href="{{route('addPdcprogram')}}" >د (پي ډي سي) پروګرام ثبتول</a></li>
										<li><a href="{{route('addEduProgram')}}">دعلمي ترفېع/ تقرر پروګرام ثبتول</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="#" class=""><span> پروګرامونو لیست</span> <span class="menu-arrow"></span></a>
									<ul style="display: none;">
										<li><a href="/admin/pdcProgramList" dir="rtl">د (پي ډي سي) پروګرامونه</a></li>
										<li><a href="/admin/educationalProgramList">دعلمي ترفېع/ تقرر پروګرامونه</a></li>
									</ul>
								</li>
								<!-- <li><a href="addProgram">پروګرام ثبتول</a></li>
								<li><a href="addEduProgeam">دعلمي ترفېع/ تقرر پروګرام ثبتول </a></li> -->
							</ul>

							
						</li>
						<li class="submenu">
							<a href="#"> <span> ګدونوال</span> <i class="fa fa-users" style="font-size:20px;"></i> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<!-- <li><a class="active" href="test">پروګرامونه</a></li> -->
								<li class="submenu">
									<a href="#" class=""><span>غړی ثبتول</span> <span class="menu-arrow"></span></a>
									<ul style="display: none;">
										<li><a href="/admin/memberRegisteration">سیسټم ته غړی اضافه کول</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="#" class=""><span>ګدونوالو لیست</span> <span class="menu-arrow"></span></a>
									<ul style="display: none;">
										<li><a href="/admin/facilitatorList" dir="rtl">د پروګرام تسهیلونکي </a></li>
										<li><a href="/admin/participantList">د پروګرام ګډونوال</a></li>
										<li><a href="/admin/memberList">د سیسټم عمومي ګډونوال</a></li>
									</ul>
								</li>
								<!-- <li><a href="addProgram">پروګرام ثبتول</a></li>
								<li><a href="addEduProgeam">دعلمي ترفېع/ تقرر پروګرام ثبتول </a></li> -->
							</ul>
						</li>
						<li class="submenu">
							<a href="#"> <span> راپورونه</span> <i class="fa fa-book" style="font-size:20px;"></i> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<!-- <li><a class="active" href="test">پروګرامونه</a></li> -->
								<li class="submenu">
									<a href="#" class=""><span> میاشت واره راپور</span></a>
								</li>
								<li class="submenu">
									<a href="#" class=""><span>ربعه واره راپور</span></a>
									
								</li>
								<li class="submenu">
									<a href="#" class=""><span>کلنی راپور</span> </a>
									
								</li>
								<!-- <li><a href="addProgram">پروګرام ثبتول</a></li>
								<li><a href="addEduProgeam">دعلمي ترفېع/ تقرر پروګرام ثبتول </a></li> -->
							</ul>
						</li>
						<!-- <li class="submenu">
							<a href="#"> <span> ګدونوال</span> <i class="la la-user"></i> <span class="menu-arrow"></span> </a>
							<ul style="display: none;">
								<li><a class="" href="index.html">د پروګرام تسهیلونکی ثبتول</a></li>
								<li><a class="" href="index.html">د پروګرام ګډونوال ثبتول</a></li>
							</ul>
						</li> -->
						<!-- <li class="submenu">
							<a href="#"> <span> Apps</span> <i class="la la-cube"></i><span
									class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="chat.html">Chat</a></li>
								<li class="submenu">
									<a href="#"><span> Calls</span> <span class="menu-arrow"></span></a>
									<ul style="display: none;">
										<li><a href="voice-call.html">Voice Call</a></li>
										<li><a href="video-call.html">Video Call</a></li>
										<li><a href="outgoing-call.html">Outgoing Call</a></li>
										<li><a href="incoming-call.html">Incoming Call</a></li>
									</ul>
								</li>
								<li><a href="events.html">Calendar</a></li>
								<li><a href="contacts.html">Contacts</a></li>
								<li><a href="inbox.html">Email</a></li>
								<li><a href="file-manager.html">File Manager</a></li>
							</ul>
						</li>
						<li class="menu-title">
							<span>Employees</span>
						</li>
						<li class="submenu">
							<a href="#" class="noti-dot"> <span> Employees</span> <i class="la la-user"></i><span
									class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="employees.html">All Employees</a></li>
								<li><a href="holidays.html">Holidays</a></li>
								<li><a href="leaves.html">Leaves (Admin) <span
											class="badge badge-pill bg-primary float-right">1</span></a></li>
								<li><a href="leaves-employee.html">Leaves (Employee)</a></li>
								<li><a href="leave-settings.html">Leave Settings</a></li>
								<li><a href="attendance.html">Attendance (Admin)</a></li>
								<li><a href="attendance-employee.html">Attendance (Employee)</a></li>
								<li><a href="departments.html">Departments</a></li>
								<li><a href="designations.html">Designations</a></li>
								<li><a href="timesheet.html">Timesheet</a></li>
								<li><a href="overtime.html">Overtime</a></li>
							</ul>
						</li>
						<li>
							<a href="clients.html"> <span>Clients</span> <i class="la la-users"></i></a>
						</li>
						<li class="submenu">
							<a href="#"> <span> Projects</span> <i class="la la-rocket"></i><span
									class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="projects.html">Projects</a></li>
								<li><a href="tasks.html">Tasks</a></li>
								<li><a href="task-board.html">Task Board</a></li>
							</ul>
						</li>
						<li>
							<a href="leads.html"> <span>Leads</span><i class="la la-user-secret"></i></a>
						</li>
						<li>
							<a href="tickets.html"> <span>Tickets</span><i class="la la-ticket"></i></a>
						</li>
					 -->
	
					</ul>
				</div>
			</div>
		</div>
		<!-- /Sidebar -->