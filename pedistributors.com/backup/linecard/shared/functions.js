// JavaScript functions
function createobject(){
	var request_object;
	var browser = navigator.appName;
	
	if (browser == "Microsoft Internet Explorer"){
		request_object = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
		request_object = new XMLHttpRequest();
	}
	
	return request_object;
}

function editlink(linkid){
	if (document.getElementById("listing_edit_" + linkid).style.display == "none"){
		document.getElementById("listing_edit_" + linkid).style.display = "";
		
		document.getElementById("listing_title_" + linkid).focus();
	} else {
		document.getElementById("listing_edit_" + linkid).style.display = "none";
	}
}

function editlinksave(linkid, root){
	
	var title = document.getElementById("listing_title_" + linkid).value;
	var url = document.getElementById("listing_url_" + linkid).value;
	var topic = document.getElementById("listing_topic_" + linkid).value;
	var priority = document.getElementById("listing_priority_" + linkid).value;
	var description = document.getElementById("listing_description_" + linkid).value;
	
	req = createobject();
	req.onreadystatechange = function(){ editlinksavedone(linkid, title, url, description); }
	req.open("POST", root + "callers/editlink.php?linkid=" + linkid, true);
	req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	req.send("title=" + escape(title) + "&url=" + escape(url) + "&topicid=" + escape(topic) + "&priority=" + escape(priority) + "&description=" + escape(description));
}

function editlinksavedone(linkid, title, url, description){
	
	if (req.readyState == 4){
		
		var result = req.responseText;
		alert(result);
		
		if (result == "Link updated successfully!"){
			editlink(linkid);
			document.getElementById("listing_link_" + linkid).innerHTML = title;
			document.getElementById("listing_link_" + linkid).href = url;
			
			if (description != ''){
				document.getElementById("listing_current_description_" + linkid).innerHTML = " - " + description;
			} else {
				document.getElementById("listing_current_description_" + linkid).innerHTML = "";
			}
		}
	}
}

function editnewtopic(newtopicid){
	if (document.getElementById("newtopic_container_" + newtopicid).style.display == "none"){
		document.getElementById("newtopic_container_" + newtopicid).style.display = "";
		
		document.getElementById("newtopic_title_" + newtopicid).focus();
	} else {
		document.getElementById("newtopic_container_" + newtopicid).style.display = "none";
	}
}

function editnewtopicsave(newtopicid, root){
	
	var title = document.getElementById("newtopic_title_" + newtopicid).value;
	var email = document.getElementById("newtopic_email_" + newtopicid).value;
	var topic = document.getElementById("newtopic_parent_" + newtopicid).value;
	var description = document.getElementById("newtopic_description_" + newtopicid).value;
	
	req = createobject();
	req.onreadystatechange = function(){ editnewtopicdone(newtopicid, title, description); }
	req.open("POST", root + "callers/editnewtopic.php?newtopicid=" + newtopicid, true);
	req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	req.send("title=" + escape(title) + "&email=" + escape(email) + "&topicid=" + escape(topic) + "&description=" + escape(description));
}

function editnewtopicdone(id, title, description){
	
	if (req.readyState == 4){
		
		var result = req.responseText;
		alert(result);
		
		if (result == "Topic updated successfully!"){
			editnewtopic(id);
			document.getElementById("newtopic_current_title_" + id).innerHTML = title;
			
			if (description != ''){
				document.getElementById("newtopic_current_description_" + id).innerHTML = " - " + description;
			} else {
				document.getElementById("newtopic_current_description_" + id).innerHTML = "";
			}
		}
	}
}

function editqueue(id){
	if (document.getElementById("url_edit_" + id).style.display == "none"){
		document.getElementById("url_edit_" + id).style.display = "";
		
		document.getElementById("url_title_" + id).focus();
	} else {
		document.getElementById("url_edit_" + id).style.display = "none";
	}
}

function editqueuesave(id, root){
	
	var title = document.getElementById("url_title_" + id).value;
	var url = document.getElementById("url_url_" + id).value;
	var topic = document.getElementById("url_topic_" + id).value;
	var email = document.getElementById("url_email_" + id).value;
	var description = document.getElementById("url_description_" + id).value;
	
	req = createobject();
	req.onreadystatechange = function(){ editqueuedone(id, title, url, description); }
	req.open("POST", root + "callers/editqueue.php?queueid=" + id, true);
	req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	req.send("title=" + escape(title) + "&url=" + escape(url) + "&topicid=" + escape(topic) + "&email=" + escape(email) + "&description=" + escape(description));
}

function editqueuedone(id, title, url, description){
	
	if (req.readyState == 4){
		
		var result = req.responseText;
		alert(result);
		
		if (result == "Link updated successfully!"){
			editqueue(id);
			document.getElementById("url_link_" + id).innerHTML = title;
			document.getElementById("url_link_" + id).href = url;
			
			if (description != ''){
				document.getElementById("url_current_description_" + id).innerHTML = " - " + description;
			} else {
				document.getElementById("url_current_description_" + id).innerHTML = "";
			}
		}
	}
}

function deletelink(linkid, root){
	
	var con = confirm('Are you sure you want to delete this?');
	if (con == true){
	
		req = createobject();
		req.onreadystatechange = function(){ deletelinkdone(linkid); }
		req.open("GET", root + "callers/deletelink.php?linkid=" + linkid, true);
		req.send(null);
	
	}
}

function deletelinkdone(linkid){
	
	if (req.readyState == 4){
		
		var result = req.responseText;
		
		if (result == "Link deleted successfully!"){
			
			document.getElementById("listing_container_" + linkid).style.display = "none";
			
		} else {
			alert(result);
		}
	}
	
}

function editorpage(page){
	
	document.getElementById("editor-addlinks").style.display = "none";
	document.getElementById("editor-subtopics").style.display = "none";
	document.getElementById("editor-edittopic").style.display = "none";
	document.getElementById("editor-deletetopic").style.display = "none";
	
	document.getElementById("editortab-addlinks").className = "editorboxtop";
	document.getElementById("editortab-subtopics").className = "editorboxtop";
	document.getElementById("editortab-edittopic").className = "editorboxtop";
	document.getElementById("editortab-deletetopic").className = "editorboxtop";
	
	document.getElementById("editor-" + page).style.display = "";
	document.getElementById("editortab-" + page).className = "editorboxtab";
	
	if (page == "addlinks"){
		document.getElementById("editor-addlinks-title").focus();
	} else if (page == "subtopics"){
		document.getElementById("editor-subtopics-title").focus();
	} else if (page == "edittopic"){
		document.getElementById("editor-edittopic-title").focus();
	}
	
	return false;
}

function togglevisibility(topicid, root){
	
	document.getElementById('visbutton').disabled = true;
	document.getElementById('visbutton').value = "Processing...";
	
	req = createobject();
	req.onreadystatechange = function(){ togglevisibilitydone(topicid); }
	req.open("GET", root + "callers/togglevisibility.php?topicid=" + topicid, true);
	req.send(null);
}

function togglevisibilitydone(linkid){
	
	if (req.readyState == 4){
		
		// alert the result
		var result = req.responseText;
		alert(result);
		
		// reset values
		document.getElementById('visbutton').disabled = false;
		document.getElementById('visbutton').value = "Toggle Visibility";
		
		// update form
		if (result == "Topic has been set to invisible"){
			document.getElementById('visible').selectedIndex = 1;
		} else if (result == "Topic has been set to visible"){
			document.getElementById('visible').selectedIndex = 0;
		}
	}
	
}