<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/wp-content/themes/astra/style.css">
    <title>API Post</title>
</head>
<body>

<h1>Add Post</h1>
  <input id="title">
  <textarea id="content"></textarea>
  <button class="js-add-post">Add post</button>

<script>
    fetch('https://cdn-api.co-vin.in/api/v2/admin/location/states').then(function(response){
        return response.json()
    }).then(function(posts){
        console.log(posts)
    });

    fetch('https://legalsuvidha.growsocio.com/wp-json/jwt-auth/v1/token',{
    method: "POST",
    headers:{
        'Content-Type': 'application/json',
        'accept': 'application/json',
    },

    body:JSON.stringify({
        username: 'apiauthor',
        password: 'Radhaswami@123'
    })
    }).then(function(response){
        return response.json()
    }).then(function(user){
        console.log(user.token)
        localStorage.setItem('jwt', user.token)
    });

    function addPost() {
      var title = document.getElementById('title').value;
      var content = document.getElementById('content').Value;
        fetch('https://legalsuvidha.growsocio.com/wp-json/wp/v2/posts',{
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'accept': 'application/json',
                'Authorization': `Bearer ${localStorage.getItem('jwt')}`
            },
            body:JSON.stringify({
                title: title,
                content: content,
                status: 'publish'
            })
        }).then(function(response){
            return response.json()
        }).then(function(post){
            console.log(post)
        });
    }

    const addPostButton = document.querySelector('.js-add-post')
    addPostButton.addEventListener('click', () => addPost())
    
</script>
    


</body>
</html>
