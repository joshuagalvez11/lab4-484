registerBtn = $("#registerBtn")
r_email = $("#r_email")
r_p1 = $("#r_p1")
r_p2 = $("#r_p2")
r_email_err = $("#r_email-err")
r_pass_match_err = $("#r_pm-err")
r_pass_length_err = $("#r_pl-err")
r_pass_chars_err = $("#r_pc-err")

loginBtn = $("#loginBtn")
l_email = $("#l_email")
l_p = $("#l_pass")
l_email_err = $("#l_email-err")
l_pass_err = $("#l_p-err")


const emailRegex = new RegExp(/^[A-Za-z0-9_!#$%&'*+\/=?`{|}~^.-]+@[A-Za-z0-9.-]+$/);
const passwordRegex = new RegExp(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/)

function registerSubmit() {
    event.preventDefault()
    let email, p1, p2
    email = r_email.val()
    console.log(r_email.val())
    p1 = r_p1.val()
    console.log(r_p1.val())
    p2 = r_p2.val()
    console.log(r_p2.val())

    val_email = emailRegex.test(email)
    val_password_match = p1 == p2
    val_password_length = (p1.length>= 7 && p1.length<=12)
    val_password_chars = passwordRegex.test(p1)


    console.log(val_email)
    console.log(val_password_match)
    console.log(val_password_length)
    console.log(val_password_chars)

    if(val_email && val_password_match && val_password_length && val_password_chars){
        console.log('all good')
        document.body.classList.remove('bad-form')
        window.location.replace("./assets/html/about-me.html")
    }
        if(!val_email){
            console.log('bad email')
            r_email_err.addClass('err-true')
            document.body.classList.add('bad-form')
        }else{
            r_email_err.addClass('err-false')
            r_email_err.removeClass('err-true')
        }
        if(!val_password_match){
            console.log('password dont match')
            r_pass_match_err.addClass('err-true')
            document.body.classList.add('bad-form')
        }else{
            r_pass_match_err.addClass('err-false')
            r_pass_match_err.removeClass('err-true')
        }
        if(!val_password_length){
            console.log('password legnth')
            r_pass_length_err.addClass('err-true')
            document.body.classList.add('bad-form')
        }else{
            r_pass_length_err.addClass('err-false')
            r_pass_length_err.removeClass('err-true')
        }
        if(!val_password_chars){
            console.log('password chars')
            r_pass_chars_err.addClass('err-true')
            document.body.classList.add('bad-form')
        }else{
            r_pass_chars_err.addClass('err-false')
            r_pass_chars_err.removeClass('err-true')
        }


}
function loginSubmit() {
    event.preventDefault()
    let email, p1, p2
    email = l_email.val()
    console.log(l_email.val())
    p = l_p.val()
    console.log(l_p.val())

    val_email = emailRegex.test(email)
    val_password = (p.length>= 1)

    console.log(val_email)
    console.log(val_password)

    if(val_email && val_password){
        console.log('all good')
        document.body.classList.remove('bad-form')
        window.location.replace("./assets/html/about-me.html")
    }
        if(!val_email){
            console.log('bad email')
            l_email_err.addClass('err-true')
            document.body.classList.add('bad-form')
        }else{
            l_email_err.addClass('err-false')
            l_email_err.removeClass('err-true')
        }
        if(!val_password){
            console.log('password dont match')
            l_pass_err.addClass('err-true')
            document.body.classList.add('bad-form')
        }else{
            l_pass_err.addClass('err-false')
            l_pass_err.removeClass('err-true')
        }
}
registerBtn.click(registerSubmit);

loginBtn.click(loginSubmit);