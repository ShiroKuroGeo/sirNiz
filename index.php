<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue Javascript midterm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container">
            <div class="row mt-5">
                <div class="col-5">
                    <form @submit="insertGuest" class="submitForm">
                        <h1>SIGN OUR GUESTBOOK</h1>
                        <!-- <label for="Name" class="mt-2">Name</label> -->
                        <input type="text" name="name" class="form-control">
                        <!-- <label for="Email" class="mt-2">Email</label> -->
                        <input type="email" name="email" class="form-control">
                        <!-- <label for="Website" class="mt-2">Website URL</label> -->
                        <input type="url" name="website" class="form-control">
                        <!-- <label for="Comment" class="mt-2">Comment</label> -->
                        <textarea name="comment" class="form-control" cols="30" rows="10"></textarea>
                        <!-- <label for="name" class="mt-2">Upload Photo</label> -->
                        <input type="file" name="upload" class="form-control">
                        <button type="submit" class="btn btn-primary col-3 mt-3">Submit</button>
                    </form>
                </div>
                <div class="col-2"></div>
                <div class="col-5">
                    <h1>LATEST GUESTBOOK</h1>
                    <div class="border" v-for="user in users">
                        <img :src="'pictures/' + user.profilepic" class="img-fluid">
                        <p>{{ user.name }}</p>
                        <p>Email:{{ user.email }}</p>
                        <p>Url:{{ user.url }}</p>
                        <p>Comment:{{ user.comment }}</p>
                        <p>date/Time:{{ user.now }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="javascript/axios.js"></script>
    <script src="javascript/vue.3.js"></script>
    <script src="javascript/midtermVue.js"></script>
</body>
</html>