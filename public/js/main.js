
$(document).ready(()=>{
  $('.image').change(function(){
    const file = this.files[0];
    if (file){
      let reader = new FileReader();
      reader.onload = function(event){
        console.log(event.target.result);
        $('.employeePreviewImg img').attr('src',event.target.result);
      }
      reader.readAsDataURL(file);
    }
  });
});

$(document).ready(()=>{
  $('.emupimage').change(function(){
    const file = this.files[0];
    if (file){
      let reader = new FileReader();
      reader.onload = function(event){
        console.log(event.target.result);
        $('.UpEmPreviewImg').attr('src',event.target.result);
      }
      reader.readAsDataURL(file);
    }
  });
});

/*toastr.options.extendedTimeOut = 1000000; //1000;
toastr.options.timeOut = 0;
toastr.options.fadeOut = 250;
toastr.options.fadeIn = 250;*/





