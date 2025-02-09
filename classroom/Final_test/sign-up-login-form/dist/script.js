let users = JSON.parse(localStorage.getItem("users")) || [];

if (users.length === 0) {
    users.push({ username: "admin", password: "1234" });
    localStorage.setItem("users", JSON.stringify(users));
}

document.getElementById("register_form").addEventListener("submit", function(event) {
    event.preventDefault(); // ป้องกันการรีโหลดหน้า
    let newUsername = document.getElementById("regist_username").value.trim();
    let newPassword = document.getElementById("regist_password").value.trim();

    const existingUser = users.find(user => user.username === newUsername);
    if (existingUser) {
        alert("❌ Username already exists!");
    }
    else{
    users.push({ username: newUsername, password: newPassword });
    localStorage.setItem("users", JSON.stringify(users));
    alert("✅ Account created successfully!");
    }
    console.log(users);
});

console.log(users);

document.getElementById("login_form").addEventListener("submit", function(event) {
    event.preventDefault(); // ป้องกันการรีโหลดหน้า
   
    const usernameInput = document.getElementById("login_username").value.trim();
    const passwordInput = document.getElementById("login_password").value.trim();

    // ตรวจสอบข้อมูลใน array
    const user = users.find(user => user.username === usernameInput && user.password === passwordInput);
    console.log(users);
    if (user) {
        alert("✅ login sucess");
    }else{
        alert("❌ login failed: 'Incorect Username or Password'");
    }
});
