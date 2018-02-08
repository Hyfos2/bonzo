const ERRORS = {

// Users
     nameField:'The name field is required',
    surnameField :'The surname field is required',
    emailField: 'The email field is required',
     positionField: 'The position field is required',
     gradeField: 'The grade field is required',
    
    dobField: 'Pick your date of birth',
    dateOfEmploymentField:'Pick a date of recruitment',
    employmentTypeIdField:'The employment type is required',
    employeeNumberField:'The employee number is required',
    departmentIdField:'The department field is required',
   genderField:'The gender field is required',
   
   
    typeIdField:'Fill in the product type',
    specificationField:'Fill in the product specification',
    orderedDateField:'Fill in the product ordered date',
    receivedDateField:'Fill in the product received date',
    priceField:'Fill in the product price',
    unitField:'Fill in the product unit',
    recipeintNameField:'Fill in the Recipeint name',
    confirmPwdField:'Fill in the Password',
    productNameField:'Fill in the Product Name',
    quantityField:'Fill in the Product Quantity',
    regionField: 'Fill in the region',
   // positionField:'Fill in the position',
    physicalAddressField:'Fill in the Physical Address',
    cellphoneField:'Fill in the cellphone'
};

if (document.querySelector('#registrationForm')) {
   new Vue({
    el: "#registrationForm",
    data: {
        name: '',
        surname: '',
        email: '',
        positionId: '',
        gradeId: '',
          isHidden: false,
        submition: false
    },
    computed: {
        wrongName:function() {
            if(this.name === '') {
            this.nameFB = ERRORS.nameField;
            return true
            }
            return false
        },
        wrongSurname:function() {  if(this.surname === '') {
            this.surnameFB = ERRORS.surnameField;
            return true
        }
            return false },
        wrongEmail:function() {  if(this.email === '') {
            this.emailFB = ERRORS.emailField;
            return true
        }
            return false },
         wrongPositionId:function() { if(this.positionId === '') {
            this.positionFB = ERRORS.positionField;
            return true
        }
            return false },
        wrongGradeId:function() {  if(this.gradeId === '') {
            this.gradeFB = ERRORS.gradeField;
            return true
        }
            return false }
    },
    methods: {
        registerUser:function(event) {
            this.submition = true;
            this.$validator.validateAll();
            if(this.wrongName || this.wrongSurname || this.wrongEmail ||  this. wrongPositionId || this.wrongGradeId  || this.errors.any())
                {
                    event.preventDefault();
                } 
            else {
                   return true;
                }
        },
    watch:
            {
                email:function()
                {
                    let str = this.email;
                    
                    if(str.length > 0)
                        return    this.isHidden = true;
                  
                }

            }
    }
})
}

if (document.querySelector('#staffRegistrationForm')) {
new Vue({
    el: "#staffRegistrationForm",
       data: {
         name: '',
        surname: '',
        dob: '',
        gender: '',
        dateOfEmployment: '',
        employmentTypeId:'',
        employeeNumber: '',
        departmentId: '',
        positionId: '',
        gradeId: '',
        submition: false
    },
    computed: {
        wrongName:function() {
            if(this.name === '') {
            this.nameFB = ERRORS.nameField;
            return true
            }
            return false
        },
        wrongSurname:function() {  if(this.surname === '') {
            this.surnameFB = ERRORS.surnameField;
            return true
        }
            return false },
        wrongDob:function() {  if(this.dob === '') {
            this.dobFB = ERRORS.dobField;
            return true
        }
            return false },
            wrongGender:function() {  if(this.gender === '') {
            this.gFB = ERRORS.genderField;
            return true
        }
            return false },
               wrongdateOfEmploment:function() {  if(this.dateOfEmployment === '') {
            this.doeFB = ERRORS.dateOfEmploymentField;
            return true
        }
            return false },
               wrongEmploymentTypeId:function() {  if(this.employmentTypeId === '') {
            this.etiFB = ERRORS.employmentTypeIdField;
            return true
        }
            return false },
               wrongEmployeeNumber:function() {  if(this.employeeNumber === '') {
            this.enumFB = ERRORS.employeeNumberField;
            return true
        }
            return false },
               wrongDpt:function() {  if(this.departmentId === '') {
            this.dptFB = ERRORS.departmentIdField;
            return true
        }
            return false },

               wrongPstn:function() {  if(this.positionId === '') {
            this.pstnFB = ERRORS.positionField;
            return true
        }
            return false },

               wrongGrade:function() {  if(this.gradeId === '') {
            this.gradeFB = ERRORS.gradeField;
            return true
        }
            return false },


    },
    methods: {
        validStaffForm:function(event) {
            this.submition = true;
              this.$validator.validateAll();

            if(this.wrongName || this.wrongSurname || this.wrongDob  || this.wrongdateOfEmploment  || this.wrongEmploymentTypeId  || this.wrongEmployeeNumber  || this.wrongDpt || this.wrongPstn || this.wrongGrade ||   this.errors.any());
               
                {
                     event.preventDefault()

                }
        }


    }

});
}

if (document.querySelector('#userPreferenceForm')) {
   new Vue({
    el: "#userPreferenceForm",
    data: {
        password: '',
        passwordFB: '',
        passwordVerificationFB: '',
        confirm_password: '',
        submition: false
    },
    computed: {
        wrongPassword:function() {  if(this.password === '') {
            this.passwordFB = ERRORS.pwdField;
            return true
        }
            return false },
        wrongPwdVerification:function() {  if(this.confirm_password === '') {
            this.passwordVerificationFB = ERRORS.confirmPasswordField;
            return true
        }
            return false },

            passwordMisMatch:function() {  if(this.confirm_password !== this.password) {
            this.passwordMisMatchFB = ERRORS.passwordMisMatchField;
            return true
        }
            return false }
    },
    methods: {
        preferenceForm:function(event) {
            this.submition = true;
            if(this.wrongPassword || this.wrongPwdVerification || this.passwordMisMatch)
                event.preventDefault();
            else {
                    axios.post('/preference')
                        .then(function (response) {
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }
        },

        updateDroneType: function (value) {
                if (value !== '') {
                    this.serviceTypeData = [];
                    axios.get('/api/v1/droneSubType/' + value)
                        .then(function (response) {
                            $.each(response.data, function (key, value) {
                                this.serviceTypeData.push(value);
                            }.bind(this));
                            return this.serviceTypeData;
                        }.bind(this))
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            }

    }
})
}

if (document.querySelector('#addProductTypeForm')) {
   new Vue({
    el: "#addProductTypeForm",
    data: {
        name: '',
        submition: false
    },
    computed: {
        wrongName:function() {  if(this.name === '') {
            this.nameFB = ERRORS.productTypeNameField;
            return true
        }
            return false }
    },
    methods: {
        productTypeForm:function(event) {
            this.submition = true;
            if(this.wrongName)
                event.preventDefault();
            else {
                return  true;
                }
        }

    }
})
}

if (document.querySelector('#updateForm')) {
   new Vue({
    el: "#updateForm",
    data: {
        regionId:'',
        positionId:'',
        physicalAddress:'',
        cellphone:'',
        submition: false
    },
    computed: {
        wrongRegion:function() {  if(this.regionId === '') {
            this.regionFB = ERRORS.regionField;
            return true
        }
            return false },

            wrongPosition:function() {  if(this.positionId === '') {
            this.positionFB = ERRORS.positionField;
            return true
        }
            return false },
            wrongphysicalAddress:function() {  if(this.physicalAddress === '') {
            this.physicalAddressFB = ERRORS.physicalAddressField;
            return true
        }
            return false },
            wrongCellphone:function() {  if(this.cellphone === '') {
            this.cellphoneFB = ERRORS.cellphoneField;
            return true
        }
            return false }
    },
    methods: {
        updateProfileForm:function(event) {
            this.submition = true;
            if(this.wrongRegion || this.wrongPosition || this.wrongphysicalAddress || this.wrongCellphone)
            {
             event.preventDefault();
            }
            else {
                return  true;
                }
        }

    }
})
}





