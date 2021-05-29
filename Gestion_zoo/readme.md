https://www.youtube.com/watch?v=syEq5tfg31U&ab_channel=Codersbite


hello@@hello@@hellotijani


DOTS AND BREADCUM
icon couleur blanc
lien video
caroussel image
header cri


https://www.canva.com/design/DAEfUTVuhpQ/Q3CKDyZ7HmnU2lR3rDGdEA/edit?layoutQuery=windows


  const [checked,setChecked] = React.useState(true);
        return(
          
            <div>
            <Container>
            <ThemeProvider theme={theme}>
               <Typography  variant="h2" color="primary">Animal Planet</Typography>
                <Typography variant="subtitle1" color="secondary">Learn how to use Materiel UI</Typography>
                <Typography variant="h3" component="div">Responsive h3</Typography>
               
               <ButtonGroup color="mycolor" variant="outlined">

                 <Button
                 startIcon={<Icon />}
                 size="large" 
                 style={{
                     fontSize:122
                 }}
                 color="tertiary" 
                 href="#"
                 onClick={()=>alert("hello")}>
                 </Button>

                 <Button
                startIcon={<Delete />}
                 size="large" 
                 style={{
                     fontSize:122
                 }}
                 color="secondary" 
                
                 href="#"
                 onClick={()=>alert("hello")}>
                 </Button>

               </ButtonGroup>
               

          <Card style={{
              maxWidth:375,
              media:140
          }}>
      <CardActionArea>
        <CardMedia
          className={{
              maxWidth:375,
              media:140
          }}
          image="https://img-19.ccm2.net/8vUCl8TXZfwTt7zAOkBkuDRHiT8=/1240x/smart/b829396acc244fd484c5ddcdcb2b08f3/ccmcms-commentcamarche/20494859.jpg"
          title="Contemplative Reptile"
        />
        <CardContent>
          <Typography gutterBottom variant="h5" component="h2">
            Lizard
          </Typography>
          <Typography variant="body2" color="textSecondary" component="p">
            Lizards are a widespread group of squamate reptiles, with over 6,000 species, ranging
            across all continents except Antarctica
          </Typography>
        </CardContent>
      </CardActionArea>
      <CardActions>
        <Button variant="contained" size="small" color="primary" component="button">
          Share
        </Button>
        <Button size="small" color="primary">
          Learn More
        </Button>
      </CardActions>
    </Card>

<Grid container spacing={10} justify="center">
      <Grid item xs={3} sm={6}>
       <Paper style={{
           height:75,width:'100%',
           backgroundColor:"red"
       }} />
   </Grid>
   <Grid item xs={3} sm={6}>
       <Paper style={{
           height:75,width:'100%',
           backgroundColor:"red"
       }} />
   </Grid>
   <Grid item xs={3} sm={6}>
       <Paper style={{
           height:75,width:'100%',
           backgroundColor:"red"
       }} />
   </Grid>
   <Grid item xs={3} sm={6}>
       <Paper style={{
           height:75,width:'100%',
           backgroundColor:"red"
       }} />
   </Grid>
   <Grid item xs={3} sm={6}>
       <Paper style={{
           height:75,width:'100%',
           backgroundColor:"red"
       }} />
   </Grid>
   <Grid item xs={3} sm={6}>
       <Paper style={{
           height:75,width:'100%',
           backgroundColor:"red"
       }} />
   </Grid>
</Grid>
 
<br /><br /><br /><br />
<FormControlLabel

control={<CheckBox
            checked={checked} 
            icon={<Delete/>}
            checkedIcon={<Icon/>}
            onChange={(e)=>setChecked(e.target.checked)}
            inputProps={{
                'aria-label' : 'secondary checkbox'
            }}
            name="input"
        
            />}

            label="Testing Checkbox"

/>
   <TextField
    variant="outlined"
    color="secondary"
    type="email"
    label="Email Adresse"
    placeholder="Enter your email"
    maxWidth="true"
   />


   <ButtonStyles />

      </ThemeProvider>
      </Container>
            
             
           </div>
            
             
        );