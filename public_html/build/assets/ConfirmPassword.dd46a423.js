import{u as d,o as l,c as m,w as t,a as o,b as a,H as c,d as e,n as u,e as f,f as p}from"./app.62d85f9e.js";import{_,a as w}from"./PrimaryButton.b65909f5.js";import{_ as b,a as h,b as x}from"./TextInput.a618fa8c.js";import"./ApplicationLogo.4894b858.js";const g=e("div",{class:"mb-4 text-sm text-gray-600"}," This is a secure area of the application. Please confirm your password before continuing. ",-1),V=["onSubmit"],v={class:"flex justify-end mt-4"},y=p(" Confirm "),F={name:"ConfirmPassword",setup(C){const s=d({password:""}),i=()=>{s.post(route("password.confirm"),{onFinish:()=>s.reset()})};return($,r)=>(l(),m(_,null,{default:t(()=>[o(a(c),{title:"Confirm Password"}),g,e("form",{onSubmit:f(i,["prevent"])},[e("div",null,[o(b,{for:"password",value:"Password"}),o(h,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:a(s).password,"onUpdate:modelValue":r[0]||(r[0]=n=>a(s).password=n),required:"",autocomplete:"current-password",autofocus:""},null,8,["modelValue"]),o(x,{class:"mt-2",message:a(s).errors.password},null,8,["message"])]),e("div",v,[o(w,{class:u(["ml-4",{"opacity-25":a(s).processing}]),disabled:a(s).processing},{default:t(()=>[y]),_:1},8,["class","disabled"])])],40,V)]),_:1}))}};export{F as default};
