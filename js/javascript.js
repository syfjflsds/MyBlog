/**
 * Created by syf on 14-5-30.
 */

var delayTimer;

function showGreenMenu()
{
    var downMenu = document.getElementById("downMenu");
    if(downMenu)
    {
        downMenu.style.display = "block";
    }
}

function hideGreenMenu()//隐藏下拉菜单
{
    var downMenu = document.getElementById("downMenu");
    if(downMenu)
    {
        downMenu.style.display = "none";
    }
}
function hideGreenMenuOnMouseout(e)
{
    if( !e ) e = window.event;
    var reltg = e.relatedTarget ? e.relatedTarget : e.toElement;
    while( reltg && reltg != this )
    {
        if(reltg.nodeName == "LI")
        return;
        reltg = reltg.parentNode;
    }
    hideGreenMenu();
}

function showLeaveMessageInput()
{
    var leaveMessageDialog = document.getElementById("leave_message_dialog");
    leaveMessageDialog.style.display = "block";
    slowAppear(leaveMessageDialog, 20, 1);
    return false;
}

function hideLeaveMessageInput()
{
    var leaveMessageDialog = document.getElementById("leave_message_dialog");
    slowDisappear(leaveMessageDialog, 20, 0.2);
}

/*
*   变更透明度，这里是增大的，是SlowAppear的子调用过程
 */
function changeOpacity(element, timeID, endOpactiy)
{
    element.style.opacity = parseFloat(element.style.opacity) + 0.1;
    if(element.style.opacity >= endOpactiy)
    {
        clearInterval(timeID);
        element.style.opacity = endOpactiy;
    }
}

function slowAppear(element, delay, endOpacity)
{
    element.style.opacity = "0";
    timeId =  setInterval(function(){changeOpacity(element, timeId, endOpacity)}, delay);
}

/*
 *  减小透明度
 */
function decOpacity(element, timeID, endOpactiy)
{
    element.style.opacity = parseFloat(element.style.opacity) - 0.1;
    if(element.style.opacity <= endOpactiy)
    {
        clearInterval(timeID);
        element.style.opacity = endOpactiy;
        element.style.display = "none";
    }
}

/*
 *   慢慢消失的动画
 */

function slowDisappear(element, delay, endOpacity)
{
    element.style.opacity = "1";
    timeId =  setInterval(function(){decOpacity(element, timeId, endOpacity)}, delay);

}