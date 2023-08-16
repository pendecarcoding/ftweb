<div class="col-md-4 mb-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
                <div class="image-container" style="position: relative;">
                    <img src="@if($profil->image != null) /public/users/{{$profil->image}} @else /public/go_system/images/portrait-missing.png @endif" alt="Admin" class="rounded-circle user-image" width="150">
                    <button style="position: absolute;
                    bottom: 0;
                    right: 20px;" class="btn btn-danger btn-sm rounded-circle" id="image-picker"><i class="fa fa-image"></i></button>
                </div>
                <div class="mt-3">
                    <h6>{{ $profil->full_name }}</h6>
                    <p class="text-secondary mb-1">{{ $profil->email }}:</p>
                    <p class="text-muted font-size-sm">Contact Number : {{ $profil->contact_number }}</p>
                    <button id="toggleProfil" onclick="editprofil()" class="btn btn-outline-danger">Edit Profil</button>
                    <button data-bs-toggle="modal" data-bs-target="#changepass" class="btn btn-outline-warning">Change Password</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0">My Order</h6>
                <span class="text-secondary">></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0">Notification</h6>
                <span class="text-secondary">></span>
            </li>


        </ul>
    </div>
</div>


<div class="modal fade" id="changepass">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Change Password</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <form action="{{route('gosford.profil.updatepass')}}" method="post">{{csrf_field()}}
        <div class="modal-body">
          <label for="">Old Password</label>
          <input type="password" class="form-control" name="oldpassword" required>
          <label for="">New Password</label>
          <input type="password" class="form-control" name="newpassword" required>
          <label for="">Comfirm Password</label>
          <input type="password" class="form-control" name="confirmpassword" required>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" >Update</button>
        </div>
        </form>

      </div>
    </div>
  </div>

  <script>
      document.addEventListener("DOMContentLoaded", function () {
        const imagePicker = document.getElementById("image-picker");
        const userImages = document.querySelectorAll(".user-image");
        const userAvatars = document.querySelectorAll(".user-avatar");

        imagePicker.addEventListener("click", function () {
            const input = document.createElement("input");
            input.type = "file";
            input.accept = "image/*";
            input.addEventListener("change", function () {
                const file = input.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        // Validate image extension
                        if (validateImageExtension(file)) {
                            // Update all user images
                            userImages.forEach(image => {
                                image.src = e.target.result;
                            });
                            userAvatars.forEach(avatar => {
                                avatar.style.backgroundImage = `url(${e.target.result})`;
                            });
                            // Upload the image to the server
                            uploadImage(file);
                        } else {
                            alert("Invalid image file. Allowed extensions: jpg, jpeg, png, gif");
                        }
                    };
                    reader.readAsDataURL(file);
                }
            });
            input.click();
        });

        function validateImageExtension(file) {
            const allowedExtensions = ["jpg", "jpeg", "png", "gif"];
            const extension = file.name.split('.').pop().toLowerCase();
            return allowedExtensions.includes(extension);
        }

        function uploadImage(file) {
            const formData = new FormData();
            formData.append("image", file);

            // Use Laravel's route to get the upload URL
            const uploadUrl = "{{ route('gosford.upload.image') }}";

            fetch(uploadUrl, {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
            })
            .then(response => response.json())
            .then(data => {
                // Handle response from server if needed
                console.log("Image uploaded:", data);
            })
            .catch(error => {
                // Handle errors
                console.error("Error uploading image:", error);
            });
        }
    });
</script>

