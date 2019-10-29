<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['Auth'])){
    $auth = $_POST['Auth'];
    if($auth == "radioonsucks"){
        $port = $_POST['port'];
        $botid = $_POST['botid'];
        $botname = $_POST['botname'];
        $defch = $_POST['default'];
        $srvip = $_POST['ip'];
        $systemid = strtolower($_POST['system']);
        $srvpwd = $_POST['serverpassword'];
        $uid = $_POST['uid'];
        if($_POST['request'] == 'edituser'){
			shell_exec('cd /home/tsaudio/bot && echo "QueryConnection::Address='.$srvip.'\nQueryConnection::DefaultChannel='.$defch.'\nQueryConnection::ServerPassword='.$srvpwd.'\nWebData::Port='.$port.'\nQueryConnection::Identity='.$uid.'\nQueryConnection::DefaultNickname='.$botname.'\nWebData::EnableApi=True\nWebData::EnableWebinterface=True\nWebData::WebinterfaceHostPath=WebInterface\nRightsManager::RightsFile=rights.toml\nMainBot::BotGroupId=0\nMainBot::GenerateStatusAvatar=False\nMainBot::CommandMatching=ic3\nYoutubeFactory::ApiKey=AIzaSyBOqG5LUbGSkBfRUoYfUUea37-5xlEyxNs\nYoutubeFactory::YoutubedlPath=\nPluginManager::PluginPath=Plugins\nPluginManager::WriteStatusFiles=False\nMediaFactory::DefaultPath=\nHistoryManager::EnableHistory=False\nHistoryManager::HistoryFile=history.db\nHistoryManager::FillDeletedIds=True\nAudioFramework::DefaultVolume=10\nAudioFramework::MaxUserVolume=30\nAudioFramework::AudioMode=Voice\nQueryConnection::IdentityOffset=80531632\nQueryConnection::IdentityLevel=auto\nQueryConnection::ServerPasswordIsHashed=False\nQueryConnection::ServerPasswordAutoHash=False\nQueryConnection::FfmpegPath=ffmpeg\nQueryConnection::AudioBitrate=64\nQueryConnection::ClientVersion=\nQueryConnection::DefaultChannelPassword=\nQueryConnection::ClientBadges=overwolf=0:badges=94ec66de-5940-4e38-b002-970df0cf6c94\nPlaylistManager::PlaylistPath=Playlists\nMainBot::Language=en\nWebData::HostAddress=5.231.228.135 127.0.0.1 '.$systemid.'.tsradiobot.de" > '.$botid.'.cfg');	
			header("Location: http://tsradiobot.de/cp/bot.php?p=".$port."&id=".$botid."&answer=edit");
        }
		if($_POST['request'] == 'editadmin'){
			shell_exec('cd /home/tsaudio/bot && echo "QueryConnection::Address='.$srvip.'\nQueryConnection::DefaultChannel='.$defch.'\nQueryConnection::ServerPassword='.$srvpwd.'\nWebData::Port='.$port.'\nQueryConnection::Identity='.$uid.'\nQueryConnection::DefaultNickname='.$botname.'\nWebData::EnableApi=True\nWebData::EnableWebinterface=True\nWebData::WebinterfaceHostPath=WebInterface\nRightsManager::RightsFile=rights.toml\nMainBot::BotGroupId=0\nMainBot::GenerateStatusAvatar=False\nMainBot::CommandMatching=ic3\nYoutubeFactory::ApiKey=AIzaSyBOqG5LUbGSkBfRUoYfUUea37-5xlEyxNs\nYoutubeFactory::YoutubedlPath=\nPluginManager::PluginPath=Plugins\nPluginManager::WriteStatusFiles=False\nMediaFactory::DefaultPath=\nHistoryManager::EnableHistory=False\nHistoryManager::HistoryFile=history.db\nHistoryManager::FillDeletedIds=True\nAudioFramework::DefaultVolume=10\nAudioFramework::MaxUserVolume=30\nAudioFramework::AudioMode=Voice\nQueryConnection::IdentityOffset=80531632\nQueryConnection::IdentityLevel=auto\nQueryConnection::ServerPasswordIsHashed=False\nQueryConnection::ServerPasswordAutoHash=False\nQueryConnection::FfmpegPath=ffmpeg\nQueryConnection::AudioBitrate=64\nQueryConnection::ClientVersion=\nQueryConnection::DefaultChannelPassword=\nQueryConnection::ClientBadges=overwolf=0:badges=94ec66de-5940-4e38-b002-970df0cf6c94\nPlaylistManager::PlaylistPath=Playlists\nMainBot::Language=en\nWebData::HostAddress=5.231.228.135 127.0.0.1 '.$systemid.'.tsradiobot.de" > '.$botid.'.cfg');
		    header("Location: http://tsradiobot.de/cp/botadmin.php?p=".$port."&id=".$botid."&answer=edit");		
        }
		if($_POST['request'] == 'startadmin'){
			shell_exec('cd /home/tsaudio/bot && echo "QueryConnection::Address='.$srvip.'\nQueryConnection::DefaultChannel='.$defch.'\nQueryConnection::ServerPassword='.$srvpwd.'\nWebData::Port='.$port.'\nQueryConnection::Identity='.$uid.'\nQueryConnection::DefaultNickname='.$botname.'\nWebData::EnableApi=True\nWebData::EnableWebinterface=True\nWebData::WebinterfaceHostPath=WebInterface\nRightsManager::RightsFile=rights.toml\nMainBot::BotGroupId=0\nMainBot::GenerateStatusAvatar=False\nMainBot::CommandMatching=ic3\nYoutubeFactory::ApiKey=AIzaSyBOqG5LUbGSkBfRUoYfUUea37-5xlEyxNs\nYoutubeFactory::YoutubedlPath=\nPluginManager::PluginPath=Plugins\nPluginManager::WriteStatusFiles=False\nMediaFactory::DefaultPath=\nHistoryManager::EnableHistory=False\nHistoryManager::HistoryFile=history.db\nHistoryManager::FillDeletedIds=True\nAudioFramework::DefaultVolume=10\nAudioFramework::MaxUserVolume=30\nAudioFramework::AudioMode=Voice\nQueryConnection::IdentityOffset=80531632\nQueryConnection::IdentityLevel=auto\nQueryConnection::ServerPasswordIsHashed=False\nQueryConnection::ServerPasswordAutoHash=False\nQueryConnection::FfmpegPath=ffmpeg\nQueryConnection::AudioBitrate=64\nQueryConnection::ClientVersion=\nQueryConnection::DefaultChannelPassword=\nQueryConnection::ClientBadges=overwolf=0:badges=94ec66de-5940-4e38-b002-970df0cf6c94\nPlaylistManager::PlaylistPath=Playlists\nMainBot::Language=en\nWebData::HostAddress=5.231.228.135 127.0.0.1 '.$systemid.'.tsradiobot.de" > '.$botid.'.cfg');
		    shell_exec('cd /home/tsaudio/bot && screen -d -m -S bot'.$botid.' mono TS3AudioBot.exe --config '.$botid.'.cfg'); 
			sleep(3);		
			header("Location: http://tsradiobot.de/cp/botadmin.php?p=".$port."&id=".$botid."&answer=start");			
        }
		if($_POST['request'] == 'startuser'){
			shell_exec('cd /home/tsaudio/bot && echo "QueryConnection::Address='.$srvip.'\nQueryConnection::DefaultChannel='.$defch.'\nQueryConnection::ServerPassword='.$srvpwd.'\nWebData::Port='.$port.'\nQueryConnection::Identity='.$uid.'\nQueryConnection::DefaultNickname='.$botname.'\nWebData::EnableApi=True\nWebData::EnableWebinterface=True\nWebData::WebinterfaceHostPath=WebInterface\nRightsManager::RightsFile=rights.toml\nMainBot::BotGroupId=0\nMainBot::GenerateStatusAvatar=False\nMainBot::CommandMatching=ic3\nYoutubeFactory::ApiKey=AIzaSyBOqG5LUbGSkBfRUoYfUUea37-5xlEyxNs\nYoutubeFactory::YoutubedlPath=\nPluginManager::PluginPath=Plugins\nPluginManager::WriteStatusFiles=False\nMediaFactory::DefaultPath=\nHistoryManager::EnableHistory=False\nHistoryManager::HistoryFile=history.db\nHistoryManager::FillDeletedIds=True\nAudioFramework::DefaultVolume=10\nAudioFramework::MaxUserVolume=30\nAudioFramework::AudioMode=Voice\nQueryConnection::IdentityOffset=80531632\nQueryConnection::IdentityLevel=auto\nQueryConnection::ServerPasswordIsHashed=False\nQueryConnection::ServerPasswordAutoHash=False\nQueryConnection::FfmpegPath=ffmpeg\nQueryConnection::AudioBitrate=64\nQueryConnection::ClientVersion=\nQueryConnection::DefaultChannelPassword=\nQueryConnection::ClientBadges=overwolf=0:badges=94ec66de-5940-4e38-b002-970df0cf6c94\nPlaylistManager::PlaylistPath=Playlists\nMainBot::Language=en\nWebData::HostAddress=5.231.228.135 127.0.0.1 '.$systemid.'.tsradiobot.de" > '.$botid.'.cfg');
		    shell_exec('cd /home/tsaudio/bot && screen -d -m -S bot'.$botid.' mono TS3AudioBot.exe --config '.$botid.'.cfg');
sleep(3);			
			header("Location: http://tsradiobot.de/cp/bot.php?p=".$port."&id=".$botid."&answer=start");			
        }
		
		if($_POST['request'] == 'restartadmin'){
			shell_exec('screen -x bot'.$botid.' -X stuff ^C');
			sleep(5);
			shell_exec('cd /home/tsaudio/bot && echo "QueryConnection::Address='.$srvip.'\nQueryConnection::DefaultChannel='.$defch.'\nQueryConnection::ServerPassword='.$srvpwd.'\nWebData::Port='.$port.'\nQueryConnection::Identity='.$uid.'\nQueryConnection::DefaultNickname='.$botname.'\nWebData::EnableApi=True\nWebData::EnableWebinterface=True\nWebData::WebinterfaceHostPath=WebInterface\nRightsManager::RightsFile=rights.toml\nMainBot::BotGroupId=0\nMainBot::GenerateStatusAvatar=False\nMainBot::CommandMatching=ic3\nYoutubeFactory::ApiKey=AIzaSyBOqG5LUbGSkBfRUoYfUUea37-5xlEyxNs\nYoutubeFactory::YoutubedlPath=\nPluginManager::PluginPath=Plugins\nPluginManager::WriteStatusFiles=False\nMediaFactory::DefaultPath=\nHistoryManager::EnableHistory=False\nHistoryManager::HistoryFile=history.db\nHistoryManager::FillDeletedIds=True\nAudioFramework::DefaultVolume=10\nAudioFramework::MaxUserVolume=30\nAudioFramework::AudioMode=Voice\nQueryConnection::IdentityOffset=80531632\nQueryConnection::IdentityLevel=auto\nQueryConnection::ServerPasswordIsHashed=False\nQueryConnection::ServerPasswordAutoHash=False\nQueryConnection::FfmpegPath=ffmpeg\nQueryConnection::AudioBitrate=64\nQueryConnection::ClientVersion=\nQueryConnection::DefaultChannelPassword=\nQueryConnection::ClientBadges=overwolf=0:badges=94ec66de-5940-4e38-b002-970df0cf6c94\nPlaylistManager::PlaylistPath=Playlists\nMainBot::Language=en\nWebData::HostAddress=5.231.228.135 127.0.0.1 '.$systemid.'.tsradiobot.de" > '.$botid.'.cfg');
		    shell_exec('cd /home/tsaudio/bot && screen -d -m -S bot'.$botid.' mono TS3AudioBot.exe --config '.$botid.'.cfg');   
			sleep(3);
			header("Location: http://tsradiobot.de/cp/botadmin.php?p=".$port."&id=".$botid."&answer=restart");            
        }
		if($_POST['request'] == 'restartuser'){
			shell_exec('screen -x bot'.$botid.' -X stuff ^C');
			sleep(5);
			shell_exec('cd /home/tsaudio/bot && echo "QueryConnection::Address='.$srvip.'\nQueryConnection::DefaultChannel='.$defch.'\nQueryConnection::ServerPassword='.$srvpwd.'\nWebData::Port='.$port.'\nQueryConnection::Identity='.$uid.'\nQueryConnection::DefaultNickname='.$botname.'\nWebData::EnableApi=True\nWebData::EnableWebinterface=True\nWebData::WebinterfaceHostPath=WebInterface\nRightsManager::RightsFile=rights.toml\nMainBot::BotGroupId=0\nMainBot::GenerateStatusAvatar=False\nMainBot::CommandMatching=ic3\nYoutubeFactory::ApiKey=AIzaSyBOqG5LUbGSkBfRUoYfUUea37-5xlEyxNs\nYoutubeFactory::YoutubedlPath=\nPluginManager::PluginPath=Plugins\nPluginManager::WriteStatusFiles=False\nMediaFactory::DefaultPath=\nHistoryManager::EnableHistory=False\nHistoryManager::HistoryFile=history.db\nHistoryManager::FillDeletedIds=True\nAudioFramework::DefaultVolume=10\nAudioFramework::MaxUserVolume=30\nAudioFramework::AudioMode=Voice\nQueryConnection::IdentityOffset=80531632\nQueryConnection::IdentityLevel=auto\nQueryConnection::ServerPasswordIsHashed=False\nQueryConnection::ServerPasswordAutoHash=False\nQueryConnection::FfmpegPath=ffmpeg\nQueryConnection::AudioBitrate=64\nQueryConnection::ClientVersion=\nQueryConnection::DefaultChannelPassword=\nQueryConnection::ClientBadges=overwolf=0:badges=94ec66de-5940-4e38-b002-970df0cf6c94\nPlaylistManager::PlaylistPath=Playlists\nMainBot::Language=en\nWebData::HostAddress=5.231.228.135 127.0.0.1 '.$systemid.'.tsradiobot.de" > '.$botid.'.cfg');
		    shell_exec('cd /home/tsaudio/bot && screen -d -m -S bot'.$botid.' mono TS3AudioBot.exe --config '.$botid.'.cfg');  
						sleep(3);
			header("Location: http://tsradiobot.de/cp/bot.php?p=".$port."&id=".$botid."&answer=restart");			
        }
		if($_POST['request'] == 'killadmin'){
			header("Location: http://tsradiobot.de/cp/botadmin.php?p=".$port."&id=".$botid."&answer=killed");
			shell_exec('screen -x bot'.$botid.' -X stuff ^C');
			sleep(5);
			shell_exec('screen -x bot'.$botid.' -x -X kill');
			sleep(2); 
			            
        }
    }else {
        exit;
    }
    
    
}
    }else {
        die();
        exit;
    }

 


?>
