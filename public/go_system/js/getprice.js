

    var id_leather = null;
    var id_coverage = null;
    var type_car    = null;
    let selectedColors = [];
    var selectedpattern = [];
    let colorPrice = 0;
    var designprice = 0;
    var DesignJsonArray;
    var Total = 0;
    var Priceseat = 0;
    var colorJsonArray;

    function editcolor() {
            $('#pick-color').toggle();
    }

    function editdesign() {
        $('#pick-design').toggle();
    }
    $(document).ready(function() {
      // Toggle pick-color when clicking on "Pick Color"
      $('#toggleColor').click(function() {
        $('#pick-color').toggle();
      });

      $('#editcolor').click(function() {
        $('#pick-color').toggle();
      });
    // Hide pick-color when clicking the close icon
    $('#closeIcon').click(function(event) {
      event.preventDefault(); // Prevent the link's default behavior
      $('#pick-color').hide();
    });


    $('#cartype').change(function() {
        type_car    = $('#cartype').val();
        updateSubmitButtonState();
    })


    $('#donebuttoncolor').click(function(event) {
        event.preventDefault(); // Prevent the link's default behavior
        $('#pick-color').hide();
      });

    //Toggle Design
    $('#toggleDesign').click(function() {
        $('#pick-design').toggle();
      });

      $('#editdesign').click(function() {
        $('#pick-design').toggle();
      });

      $('#closeIcondesign').click(function(event) {
        event.preventDefault(); // Prevent the link's default behavior
        $('#pick-design').hide();
      });

      $('#donebuttondesign').click(function(event) {
        event.preventDefault(); // Prevent the link's default behavior
        $('#pick-design').hide();
      });





  });
  function interiorSelected(checkbox) {
    checkbox.classList.toggle('selected');
    updateSubmitButtonState();
}

  function MaterialSelected(element,idleather) {
    // Remove the 'selected' class from all elements
    const elements = document.querySelectorAll('.card-material-type');
    elements.forEach(el => el.classList.remove('selected'));

    // Add the 'selected' class to the clicked element
    element.classList.add('selected');
    id_leather = idleather;
    updateSubmitButtonState();
}

function CoverageSelected(elemento,idcoverage){
     // Remove the 'selected' class from all elements
     const elements = document.querySelectorAll('.card-leather-types');
     elements.forEach(els => els.classList.remove('selected'));

     // Add the 'selected' class to the clicked element
     elemento.classList.add('selected');
     id_coverage = idcoverage;
     updateSubmitButtonState();
}



  function updateSelectionMode() {
    const singleColorMode = document.getElementById('flexRadioDefault1').checked;
    selectedColors = singleColorMode ? [] : selectedColors.slice(0, 2);
    updateSelectedDetails();
  }

  function selectColor(element, name, img, price) {
    const singleColorMode = document.getElementById('flexRadioDefault1').checked;

    if (singleColorMode) {
      // Single color mode, allow only one selection
      selectedColors = [{ name, img, price }];
      colorPrice = price;
    } else {
      // Two-tone color mode, allow up to two selections
      if (selectedColors.find(item => item.name === name)) {
        // Deselect if already selected
        selectedColors = selectedColors.filter(item => item.name !== name);
        colorPrice -= price;
      } else {
        // Select if not already selected and there are less than 2 selected
        if (selectedColors.length < 2) {
          selectedColors.push({ name, img, price });
          colorPrice += price;
        }
      }
    }

    updateSelectedDetails();
  }

  function updateSelectedDetails() {


    // Remove the border from all elements
    document.querySelectorAll('.color-column-list').forEach(item => {
      item.classList.remove('selected');
    });

    // Add border to the selected elements
    selectedColors.forEach(item => {
      item.img = item.img || ''; // Handle cases where img is undefined
      const element = document.querySelector(`[src='${item.img}']`);
      if (element) {
        element.parentElement.classList.add('selected');
      }
    });

    // Update the selected colors and price
    const selectedColorsInfo = selectedColors.map(colorItem => {
      return `
        <div class='list-color-detail'>
        <div style='display:flex;gap:13px'><img src="${colorItem.img}" alt="${colorItem.name}">
        <div class='name-color-list'>${colorItem.name}</div></div>
        <div style='display:flex;gap:13px'>
          <div id="editcolor" onclick='editcolor()' style='cursor:pointer' class='name-color-list'><i class='fa fa-pencil'></i> <u>Edit</u></div>
          <div class='name-color-list'>+RM${colorItem.price}
        </div>
        </div>
        </div>
      `;
    });
    if (selectedColors.length > 0) {
      $('#toggleColor').hide();
      document.getElementById('selectedColors').innerHTML = selectedColorsInfo.join(' ');
    } else {
      $('#toggleColor').show();
      document.getElementById('selectedColors').innerHTML = '';
    }
    document.getElementById('selectedPrice').innerText = 'RM' + colorPrice.toFixed(2);
    updateSubmitButtonState();
  }


  function selectPattern(element, patternName, imageUrl, price) {
    // Remove border from all images
    const images = document.querySelectorAll('.img-pattern-option');
    images.forEach(img => img.style.border = 'none');

    // Add border to the selected image
    const selectedImage = element.querySelector('.img-pattern-option');
    selectedImage.style.border = '3px solid brown';

    // Logic to display selected pattern details
    const selectedDesignInfo = `
        <div class='list-color-detail'>
            <div style='display:flex; gap:13px'>
                <img src="${imageUrl}" alt="${patternName}">
                <div class='name-color-list'>${patternName}</div>
            </div>
          <div style='display:flex;gap:13px'>
            <div onclick='editdesign()' style='cursor:pointer' class='name-color-list'><i class='fa fa-pencil'></i> <u>Edit</u></div>
                <div class='name-color-list'>+RM${price}</div>
            </div>
          </div>
    `;

    if (selectedImage) {
        toggleDesign.classList.add('selected');
        $('#toggleDesign').hide();
        document.getElementById('selectedDesign').innerHTML = selectedDesignInfo;
    } else {
        $('#toggleDesign').show();
        document.getElementById('selectedDesign').innerHTML = '';
    }

    document.getElementById('selectedPriceDesign').innerText = 'RM' + price.toFixed(2);
    designprice=price;
    selectedpattern = [{patternName,imageUrl,price}];
    updateSubmitButtonState();



    // Call the function initially to set the initial state of the submit button

}

function clearall(){
    $('#toggleDesign').show();
    $('#toggleColor').show();
    document.getElementById('selectedColors').innerHTML = '';
    document.getElementById('selectedDesign').innerHTML = '';
    document.querySelectorAll('.color-column-list').forEach(item => {
        item.classList.remove('selected');
      });
    document.querySelectorAll('.card-leather-types').forEach(item => {
        item.classList.remove('selected');
      });
      document.querySelectorAll('.card-leather-type').forEach(item => {
        item.classList.remove('selected');
      });
      document.querySelectorAll('.card-material-type').forEach(item => {
        item.classList.remove('selected');
      });
   id_leather = null;
   id_coverage = null;
   selectedColors = [];
   selectedpattern = [];
   colorPrice = 0;
   designprice = 0;
   Total= 0.00;
   document.getElementById('totalall').innerText = 'RM' + Total.toFixed(2);
   updateSubmitButtonState();
}


function updateSubmitButtonState() {
   console.log('id_leather ='+id_leather);
   console.log('car_type ='+type_car);
   console.log('id_coverage ='+id_coverage);

   colorJsonArray = selectedColors.map(colorItem => {
    return {
        color: colorItem.name,
        price: colorItem.price
    };
   });
   console.log('Selected Colors JSON:', JSON.stringify(colorJsonArray, null, 2));
   DesignJsonArray = selectedpattern.map(item=>{
    return {
        image:item.imageUrl,
        price:item.price,
        name:item.patternName
    }
   })
   console.log('Design JSON:', JSON.stringify(DesignJsonArray, null, 2));
   console.log('Design Price : '+designprice);

   let allChecked = true;

    // Check if dropdown and all checkboxes have valid selections
    if (id_leather == null || type_car == null || type_car =='' || selectedColors.length == 0 || selectedpattern == 0) {
        allChecked = false;
        $('#submit').removeClass('color--gray').addClass('color--green');
    }else{
        $('#submit').removeClass('color--green').addClass('color--gray');
        //fetch data use ajax
        if (allChecked) {
            const csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/product_project/gosford/f/fetchpriceseat",
                type: 'POST',
                data: {
                    type_car: type_car,
                    id_leather: id_leather,
                    id_coverage: id_coverage
                },
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    // Handle the successful response here
                    // console.log('Data fetched successfully:', response);
                    Total = response.price+designprice+colorPrice;
                    Priceseat = response.price;
                    console.log('Total Price :'+Total);
                    document.getElementById('totalall').innerText = 'RM' + Total.toFixed(2);

                },
                error: function(error) {
                    // Handle errors here
                    console.error('Error fetching data:', error);
                }
            });
        }
    }

    // Enable/disable the submit button based on checkbox state
    $('#submit').prop('disabled', !allChecked);


}


function submitOrder() {
    // Ensure jQuery is properly loaded before using $
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Assuming type_car, id_leather, id_coverage, selectedpattern, selectedColors, Total are defined elsewhere

    // Convert selected patterns to the desired format
    const designJsonArray = selectedpattern.map(item => ({
        image: item.imageUrl,
        price: item.price,
        name: item.patternName
    }));

    // Convert selected colors to the desired format
    const colorJsonArray = selectedColors.map(colorItem => ({
        color: colorItem.name,
        price: colorItem.price
    }));

    const data = {
        type_car: type_car,
        id_leather: id_leather,
        id_coverage: id_coverage,
        design: designJsonArray,
        color: colorJsonArray,
        totalprice: Total,
        priceseat:Priceseat
    };

    $.ajax({
        url: "/product_project/gosford/f/submitorder",
        type: 'POST',
        data: data,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (response) {
            if (response.status === 'success') {
                console.log('Order submitted successfully. URL:', response.url);
                window.location.href = response.url;
            } else {
                console.log('Order submission failed. Response:', response);
                // Optionally inform the user about the failed order
            }
        },
        error: function (error) {
            console.error('Error submitting order:', error);
            // Optionally display an error message to the user
        }
    });
}
