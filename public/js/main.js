const ERRORS = {

    pwdField:'Fill in the password',
    minLengthField: 'The length should be minimum 8 characters.',
    passwordMisMatchField: 'Provided passwords do not match',
    confirmPasswordField:'Fill in the confirm password',
    nameField:'Fill in the product name',
    productTypeNameField:'Fill in the product type name',
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
    positionField:'Fill in the position',
    physicalAddressField:'Fill in the Physical Address',
    cellphoneField:'Fill in the cellphone'
};

if (document.querySelector('#addProductsForm')) {
   new Vue({
    el: "#addProductsForm",
    data: {
        name: '',
        nameFB: '',
        productTypeId: '',
        type_idFB: '',
        specification: '',
        specificationFB: '',
        price: '',
        priceFB: '',
        initialQty: '',
        unitFB: '',
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
        wrongTypeId:function() {  if(this.productTypeId === '') {
            this.type_idFB = ERRORS.typeIdField;
            return true
        }
            return false },
        wrongSpecification:function() {  if(this.specification === '') {
            this.specificationFB = ERRORS.specificationField;
            return true
        }
            return false },
        wrongPrice:function() { if(this.price === '') {
            this.priceFB = ERRORS.priceField;
            return true
        }
            return false },
        wrongUnit:function() {  if(this.initialQty === '') {
            this.unitFB = ERRORS.unitField;
            return true
        }
            return false }
    },
    methods: {
        validateForm:function(event) {
            this.submition = true;
            this.$validator.validateAll();
            if(this.wrongName || this.wrongTypeId || this.wrongSpecification ||  this.wrongPrice || this.wrongUnit  || this.errors.any())
                {
                    event.preventDefault();
                } 
            else {
                    axios.post('/createProduct')
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

if (document.querySelector('#recipientForm')) {
new Vue({
    el: "#recipientForm",
       data: {
        name: '',
        nameFB: '',
        product_name: '',
        product_nameFB: '',
        quantity: '',
        quantityFB: '',
        submition: false,
        isSearching:false,
        query:'',
        users:[]
    },
    computed: {
        wrongRname:function() {
            if(this.query === '') {
            this.nameFB = ERRORS.recipeintNameField;
            return true
            }
            return false
        },
        wrongPname:function() {  if(this.product_name === '') {
            this.product_nameFB = ERRORS.productNameField;
            return true
        }
            return false },
        wrongPquantity:function() {  if(this.quantity === '') {
            this.quantityFB = ERRORS.quantityField;
            return true
        }
            return false }


    },
     // render: {
     //    require: false,
     //    type: Function,
     //    default: function (users) {
     //      return users
     //    }
     //  },
    methods: {
        recipientValidateForm:function(event) {
            this.submition = true;
            if(this.wrongRname || this.wrongPname || this.wrongPquantity)
                event.preventDefault()
        }

    },
    watch:
    {
        query: function(query)
        {
           this.isSearching = true;
           var vm = this;

           if(this.query ==='')
           {
               vm.isSearching = false;
               console.log(vm.users=[]);
               return vm.users = [];

               }
           else{
               setTimeout(function()
               {
                   axios.get('/recipientList/'+query)
                       .then(response=>{
                       vm.users = [];
                   response.data.forEach((user) =>{
                       vm.users.push(user);
                     vm.isSearching = false;

               });
               });


               } ,1000);
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





