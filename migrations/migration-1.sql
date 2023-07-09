CREATE TABLE teams(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nik VARCHAR(17) NOT NULL,
    name VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    phone VARCHAR(15) NOT NULL,
    logo TEXT DEFAULT NULL,
    user_id INT NOT  NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_teams_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE tournaments(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nik VARCHAR(17) NOT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    user_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_tournaments_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE team_tournaments(
    id INT AUTO_INCREMENT PRIMARY KEY,
    team_id INT NOT NULL,
    tournament_id INT NOT NULL,
    status ENUM('verified','not') NOT NULL,
    verified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_teams_tournaments_team_id FOREIGN KEY (team_id) REFERENCES teams(id) ON DELETE CASCADE,
    CONSTRAINT fk_teams_tournaments_tournament_id FOREIGN KEY (tournament_id) REFERENCES tournaments(id) ON DELETE CASCADE
);

CREATE TABLE tournament_group(
    id INT AUTO_INCREMENT PRIMARY KEY,
    tournament_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_tournament_group_tournament_id FOREIGN KEY (tournament_id) REFERENCES tournaments(id) ON DELETE CASCADE
);

CREATE TABLE tournament_group_team(
    id INT AUTO_INCREMENT PRIMARY KEY,
    group_id INT NOT NULL,
    team_id INT NOT NULL,
    point VARCHAR(10) NOT NULL,
    CONSTRAINT fk_tournament_group_team_group_id FOREIGN KEY (group_id) REFERENCES tournament_group(id) ON DELETE CASCADE,
    CONSTRAINT fk_tournament_group_team__eam_id FOREIGN KEY (team_id) REFERENCES teams(id) ON DELETE CASCADE
);

CREATE TABLE persons(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_card_number VARCHAR(17) DEFAULT NULL,
    name VARCHAR(100) NOT NULL,
    gender ENUM('Laki-laki','Perempuan') NOT NULL,
    birthdate date NOT NULL,
    address TEXT DEFAULT NULL,
    phone VARCHAR(13) DEFAULT NULL,
    pic_url TEXT DEFAULT NULL,
    id_card_pic TEXT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE team_persons(
    id INT AUTO_INCREMENT PRIMARY KEY,
    team_id INT NOT NULL,
    person_id INT NOT NULL,
    tournament_id INT NOT NULL,
    pic_url TEXT DEFAULT NULL,
    position VARCHAR(100) NOT NULL,
    status ENUM('verified','not') NOT NULL,
    verified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_teams_persons_team_id FOREIGN KEY (team_id) REFERENCES teams(id) ON DELETE CASCADE,
    CONSTRAINT fk_teams_persons_person_id FOREIGN KEY (person_id) REFERENCES persons(id) ON DELETE CASCADE,
    CONSTRAINT fk_teams_persons_tournament_id FOREIGN KEY (tournament_id) REFERENCES tournaments(id) ON DELETE CASCADE  
);

CREATE TABLE tournament_matches(
    id INT AUTO_INCREMENT PRIMARY KEY,
    tournament_id INT NOT NULL,
    group_id INT DEFAULT NULL,
    team_home_id INT NOT NULL,
    team_away_id INT NOT NULL,
    score_home INT NOT NULL DEFAULT 0,
    score_away INT NOT NULL DEFAULT 0,
    match_status ENUM('HT','FT','ET','AET') NOT NULL,
    schedule_at datetime NOT NULL,
    description TEXT DEFAULT NULL,
    match_log TEXT DEFAULT NULL,
    venue VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_tournament_matches_tournament_id FOREIGN KEY (tournament_id) REFERENCES tournaments(id) ON DELETE CASCADE,  
    CONSTRAINT fk_tournament_matches_group_id FOREIGN KEY (group_id) REFERENCES tournament_group(id) ON DELETE CASCADE,
    CONSTRAINT fk_tournament_matches_team_home_id FOREIGN KEY (team_home_id) REFERENCES teams(id) ON DELETE CASCADE,
    CONSTRAINT fk_tournament_matches_team_away_id FOREIGN KEY (team_away_id) REFERENCES teams(id) ON DELETE CASCADE
);

CREATE TABLE tounament_stats(
    id INT AUTO_INCREMENT PRIMARY KEY,
    person_id INT NOT NULL,
    tournament_id INT DEFAULT NULL,
    team_id INT NOT NULL,
    match_id INT NOT NULL,
    stats_type ENUM('goal','assist','yellow','red','og'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tournament_match_persons(
    id INT AUTO_INCREMENT PRIMARY KEY,
    match_id INT NOT NULL,
    team_id INT NOT NULL,
    person_id INT NOT NULL,
    position VARCHAR(100) NOT NULL,
    number INT NOT NULL,
    is_starting ENUM('YA') NOT NULL,
    play_at time DEFAULT NULL,
    stop_at time DEFAULT NULL,
    reason VARCHAR(100) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_tournament_match_persons_macth_id FOREIGN KEY (match_id) REFERENCES tournament_matches(id) ON DELETE CASCADE,
    CONSTRAINT fk_tournament_match_persons_team_id FOREIGN KEY (team_id) REFERENCES teams(id) ON DELETE CASCADE,
    CONSTRAINT fk_tournament_match_persons_person_id FOREIGN KEY (person_id) REFERENCES persons(id) ON DELETE CASCADE
);

INSERT INTO `roles` (`id`, `name`) 
        VALUES 
        ('2', 'Admin Tournament'),
        ('3', 'Admin Team')
