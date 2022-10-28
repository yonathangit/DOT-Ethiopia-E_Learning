// import { useState } from "react"
import AuthUser from './AuthUser';
// import Modal from '@material-ui/core'

// export default function Login() {
//     const {http,setToken} = AuthUser();
//     const [email,setEmail] = useState();
//     const [password,setPassword] = useState();

//     const submitForm = () =>{
//         // api call
//         http.post('/login',{email:email,password:password}).then((res)=>{
//             setToken(res.data.user,res.data.access_token);
//         })
//     }

//     return(
//         <div className="row justify-content-center pt-5">
//             <div className="col-sm-6">
//                 <div className="card p-4">
//                     <h1 className="text-center mb-3">Login </h1>
//                     <div className="form-group">
//                         <label>Email address:</label>
//                         <input type="email" className="form-control" placeholder="Enter email"
//                             onChange={e=>setEmail(e.target.value)}
//                         id="email" />
//                     </div>
//                     <div className="form-group mt-3">
//                         <label>Password:</label>
//                         <input type="password" className="form-control" placeholder="Enter password"
//                             onChange={e => setPassword(e.target.value)}
//                         id="pwd" />
//                     </div>
//                     <button type="button" onClick={submitForm} className="btn btn-primary mt-4">Login</button>
//                 </div>
//             </div>
//         </div>
//     )
// }
import { useState } from 'react';
import { Modal,TextInput, Box, Button } from '@mantine/core';
export default function Login() {
        const {http,setToken} = AuthUser();
        const [email,setEmail] = useState();
        const [password,setPassword] = useState();
    
        const submitForm = () =>{
            // api call
            http.post('/login',{email:email,password:password}).then((res)=>{
                setToken(res.data.user,res.data.access_token);
            })}
  const [opened, setOpened] = useState(true);
  return (
    <>
      <Modal
        opened={opened}
        onClose={() => setOpened(false)}
        title="Insert your information"
      >
        <Box sx={{ maxWidth: 400 }} mx="auto">
      
        <TextInput
          label="Email"
          placeholder="Email"
          onChange={e=>setEmail(e.target.value)}
        />
        <TextInput
          label="Password"
          placeholder="Password"
          mt="md"
          onChange={e => setPassword(e.target.value)}
        />
        <Button type="submit" onClick={submitForm} mt="md">
          Login
        </Button>
        {/* <button type="button" onClick={submitForm} className="btn btn-primary mt-4">Login</button> */}
      {/* {submittedValues && <Code block>{submittedValues}</Code>} */}
    </Box>
        
      </Modal>
      {/* <Group position="center">
        <Button onClick={() => setOpened(true)}>Open Modal</Button>
      </Group> */}
    </>
  )
}