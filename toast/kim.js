function kim()

{
// Examples:
// Display a message across the top of the screen

MsgPop.closeAll(); // Removes messages and resets MsgPop object
MsgPop.displaySmall =true; // Global switch that makes messages full screen
MsgPop.position = "bottom-right";
MsgPop.open({
Type:"success",
Content:"Your transaction failed! Here is the big message to prove it!",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});


}