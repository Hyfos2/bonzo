<?php


Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/site/login',
[  
    'uses'=>'loginController@login',
	'as'  =>'app.login'
]);

Route::get('/welcome','HomeController@welcome');

/*TimeSheet*/
Route::get('/createTimeSheet','TimeSheetController@viewCreateTimeSheet');
Route::post('/addTimeSheet','TimeSheetController@addTimeSheet');
Route::get('/timeSheets','TimeSheetController@timeSheets');
Route::get('/spreadSheet','TimeSheetController@index');
Route::get('getTimeSheet','TimeSheetController@getTimeSheet');
Route::get('/staffTimeSheet/{id}','TimeSheetController@staffTimeSheet');
Route::post('addTimeSheetFile','TimeSheetController@addTimeSheetFile');
Route::put('updateSheet','TimeSheetController@updateSheet');
//Route::get('staffTimeSheet','TimeSheetController@staffTimeSheet')

/*User*/
Route::get('/register','UsersController@registernewUser');
Route::get('/usersList','UsersController@usersList');
Route::get('/editUser/{id}','UsersController@editUser');
Route::get('/users','UsersController@index')->name('users');
Route::get('getSubDepartments/{id}','UsersController@getSubDepartments');
Route::post('/addUser','Auth\RegisterController@register');

/*LeaveDays*/
Route::get('/leave','LeaveController@acceptedRequests');
Route::get('getLeaveDays','LeaveController@getLeavedays');
Route::get('/getRequest','LeaveController@getRequests')->name('getRequest');
Route::get('requestListing','LeaveController@requestListing');
Route::get('requestProfile/{id}','LeaveController@requestProfile');
Route::get('hodRequestProfile/{id}','LeaveController@hodRequestProfile');
Route::post('hodRequestProfile/acceptRequest/{id}','LeaveController@acceptRequest');
Route::post('rejectReason/{id}','LeaveController@rejectReason');
Route::get('staffOnLeave','LeaveController@staffOnLeave');
Route::get('getStaffNotWorking','LeaveController@getStaffNotWorking');
Route::get('leaveProfile/{id}','LeaveController@requestProfile');
Route::get('pendingRequests','LeaveController@pendingRequests');
Route::get('getPendingRequest','LeaveController@getPendingRequest');
Route::get('rejectedRequests','LeaveController@rejectedRequests');
Route::get('getRejectedRequest','LeaveController@getRejectedRequest');

/*Staff*/
Route::post('/addLeave','StaffController@addLeave');
Route::post('/addStaff','StaffController@addStaff');
Route::get('/getstaff','StaffController@staff');
Route::get('/registerStaff','StaffController@registerStaff');
Route::get('/staffList','StaffController@companyStaff');
Route::get('/staffGrades','StaffController@staffGrades');
Route::get('/getStaffDetail/{id}','StaffController@getStaffDetail');
Route::get('/getStaffDetails/','StaffController@getStaffDetails');
Route::get('/getStaff/','StaffController@getStaff');

/*Grades*/
Route::get('/getGrades','GradesController@getGrades');
Route::post('addGrade','GradesController@addGrade');
Route::get('gradeDetails/{id}','GradesController@gradeDetails');
Route::put('editGrade','GradesController@editGrade');

/*Employment Type*/
Route::get('/employmentGroup','EmploymentTypeController@index');
Route::post('/addEmploymentType','EmploymentTypeController@add');
Route::get('/getTypes','EmploymentTypeController@getTypes');

/*Department*/
Route::post('addDepartment','DepartmentController@addDepartment');
Route::get('getDepartment','DepartmentController@getDepartment');
Route::get('/departments','DepartmentController@departmentList');
Route::put('editDepartment','DepartmentController@editDepartment');
Route::get('departmentsDetails/{id}','DepartmentController@details');

/*Positions*/
Route::get('getPositions','PositionsController@getPositions');
Route::get('/positions','PositionsController@getPositionsList');
Route::post('/addPosition','PositionsController@create');
Route::get('positionDetails/{id}','PositionsController@positionDetails');

/*Shifts*/
Route::get('/getShifts','ShiftController@getShifts')->name('getShifts');
Route::get('/getShiftDetails','ShiftController@getShiftDetails')->name('getShiftDetails');
Route::post('/addShift','ShiftController@addShift');
Route::get('/allocateShifts','ShiftController@allocateShifts');
Route::post('/allocate','ShiftController@allocate');
Route::get('workingTeam','ShiftController@workingTeam');
Route::get('getShiftTeam','ShiftController@getShiftTeam');
Route::get('workingHours','ShiftController@workingHours');


/*Categories*/

Route::post('updateCat','CategoryController@updateCat');
Route::resource('categories','CategoryController');
Route::get('getCategories','CategoryController@getCategories');
Route::get('catDetails/{id}','CategoryController@catDetails');



Route::view('email','mails.AdminMail');


