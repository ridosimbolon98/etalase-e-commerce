<?php 

			foreach ($chat as $msg) { 

	            if ($msg->id_pengirim == $this->session->userdata('id')) {
					echo "
						<div class='direct-chat-msg'>
						  <div class='direct-chat-info clearfix'>
				            <span class='direct-chat-name pull-left'>". $msg->nama. "</span>
				            <span class='direct-chat-timestamp pull-right'>". $msg->msg_date. "</span>
				          </div>
						  <div class='direct-chat-text'>
				            ". $msg->pesan."
				          </div>
				        </div>";
				} else {
					echo "
					    <div class='direct-chat-msg right'>
						  <div class='direct-chat-info clearfix'>
				            <span class='direct-chat-name pull-right'> Admin Jualin</span>
				            <span class='direct-chat-timestamp pull-left'>". $msg->msg_date. "</span>
				          </div>
						  <div class='direct-chat-text'>
				            ". $msg->pesan."
				          </div>
				        </div>";
				}

	        }

	        ?>